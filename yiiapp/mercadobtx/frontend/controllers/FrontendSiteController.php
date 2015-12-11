<?php
/**
 * Basic "kitchen sink" controller for frontend.
 * It was configured to be accessible by `/site` route, not the `/frontendSite` one!
 *
 * @package YiiBoilerplate\Frontend
 */
class FrontendSiteController extends FrontendController
{
    /**
     * Actions attached to this controller
     *
     * @return array
     */
    public function actions()
    {
        return array(
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
                'foreColor' => 0x0099CC,
            ),
            'index' => array(
                'class' => 'LandingPageAction'
            ),
            'error' => array(
                'class' => 'SimpleErrorAction'
            ),
        );
    }

    /**
     * Rules for CAccessControlFilter.
     *
     * We enable the registration and other basic pages for guest users.
     *
     * @see http://www.yiiframework.com/doc/api/1.1/CController#accessRules-detail
     *
     * @return array Rules for the "accessControl" filter.
     */
    public function accessRules()
    {
        return array_merge(
            [
                [ 'allow', 'actions' => ['index', 'error'] ]
            ],
            parent::accessRules()
        );
    }
}
