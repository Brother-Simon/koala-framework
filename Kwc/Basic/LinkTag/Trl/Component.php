<?php
class Kwc_Basic_LinkTag_Trl_Component extends Kwc_Abstract_Cards_Trl_Component
{
    public static function getSettings($masterComponent)
    {
        $ret = parent::getSettings($masterComponent);
        $ret['dataClass'] = 'Kwc_Basic_LinkTag_Data';
        return $ret;
    }

    public function getTemplateVars()
    {
        $ret = parent::getTemplateVars();
        $ret['linkTag'] = $ret['child'];
        return $ret;
    }
}
