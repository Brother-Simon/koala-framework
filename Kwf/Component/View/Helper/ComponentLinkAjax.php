<?php
class Kwf_Component_View_Helper_ComponentLinkAjax extends Kwf_Component_View_Helper_ComponentLink
{
    public function componentLinkAjax(Kwf_Component_Data $target, $switchConfig = array(), $text = null, $config = array())
    {
        $config = $this->_getConfig($target, $text, $config);
        $switchConfig['sel'] = $target->componentClass . '-ComponentAjax';
        $config['switch'] = $switchConfig;
        return $this->_getRenderPlaceholder($target->componentId, $config);
    }

    public function renderCached($cachedContent, $componentId, $config)
    {
        $ret = '<div class="' . $config['switch']['sel'] . ' kwfComponentAjax">';
        $settings = str_replace("\"", "'", Zend_Json::encode($config['switch']));
        $ret .= '<input type="hidden" class="settings" value="' . $settings . '" />';
        $config['cssClass'][] = $config['switch']['sel'];
        $ret .= parent::renderCached($cachedContent, $componentId, $config);
        $ret .= '</div>';
        return $ret;
    }
}
