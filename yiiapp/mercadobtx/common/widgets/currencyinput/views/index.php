<?php

$html_ul = '<ul>';
$widgetid = $this->id;
// output an input field for each currency, so end user doesn't try to trick us by entering
// USD values as BTC or similar tricks
$inputname = CHtml::activeId($model, $attribute) . '-currency-input';
foreach ( $supported_currencies as &$supported_currency ) {
	$style = "position:relative;";
	$html_ul .= "<li><a class='select-currency' data='$widgetid-$supported_currency' >$supported_currency</a></li>";
	if (! ($supported_currency == $currency)) {
		$style .= ' display: none; ';
	}
	
	echo "<span name='$widgetid-currency-control' data='$widgetid-$supported_currency' style='$style'>";
	echo "<span name='$widgetid-currency-badge' class='currency-badge'>$supported_currency</span>";

	$htmlOptions['name'] = $inputname;
	echo TbHtml::numberFieldControlGroup($inputname, '', $htmlOptions);
	echo "</span>";
}
$html_ul .= '</ul>';
echo $form->hiddenField($model, $attribute);


$hiddenId = CHtml::activeId($model, $attribute);
Yii::app ()->clientScript->registerScript ( 'currency-change-' . $widgetid, <<<END
	$('input[name=$inputname]').keyup(function() {
		$('#$hiddenId').val($(this).val());
	});
END
,CClientScript::POS_END
);

if ( count($supported_currencies) > 1 ) {
	$select_currency_msg = Yii::t('translation', 'Select currency');
	$cancel_msg = Yii::t('translation', 'Cancel');

	Yii::app ()->clientScript->registerScript ( 'current-switch-' . $widgetid, <<<END
		$('span[name=$widgetid-currency-badge]').click(function(){
			bootbox.dialog({
			  message: "$html_ul",
			  title: "$select_currency_msg",
			  buttons: {
			    main: {
			      label: "$cancel_msg",
			      className: "btn-default",
			      callback: function() {
			      }
			    }
			  }
			});
			$('.select-currency').click(function() {
				//alert($(this).attr('data'));
			    $('span[name=$widgetid-currency-control]').hide();
			    $('span[data=' + $(this).attr('data') + ']').show();
			    bootbox.hideAll();
			});
		});
		
	
END
,CClientScript::POS_END
	);
}
?>
