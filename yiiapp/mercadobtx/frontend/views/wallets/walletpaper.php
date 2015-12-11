<html>
<title>Wallet paper <?php echo $request->getPost('addr'); ?></title>
<head>
<script src='<?php echo $libraries ?>/jquery/jquery-1.11.0.min.js'></script>
<script src='<?php echo $libraries ?>/jquery-plugins/jquery.qrcode.min.js'></script>

<script type="text/javascript">
jQuery(document).ready(function() {
$('#k1').qrcode({text:'<?php echo $request->getPost('key1'); ?>',width:150,height:150});
$('#k2').qrcode({text:'<?php echo $request->getPost('key2'); ?>',width:150,height:150});
window.print();
});
</script>
</head>
<body>
<img alt="MeradoBTX" src="/images/logo.png" style="height: auto; width: auto;">
<table cellpadding="10">
  <tr colspan='2'>
    <td>Tu direcion Bitcoin:  <?php echo $request->getPost('addr'); ?> </td>
  </tr>
  <tr>
    <td>Llave Privada 1</td><td>Llave Privada 2</td>
  </tr>
  <tr>
    <td><div id='k1'></div></td><td><div id='k2'></div></td>
  </tr>
  <tr>
    <td><?php echo $request->getPost('key1'); ?></div></td><td><?php echo $request->getPost('key2'); ?></div></td>
  </tr>
</table>
<h2>Recuerda: Debes de guardar muy bien estos datos, tratalos como si fuera dinero, ya que cualquiera que tenga accesso podra gastar tus BitCoins.</h2>
</body>
</html>
