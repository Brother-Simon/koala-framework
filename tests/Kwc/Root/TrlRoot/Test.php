<?php
/**
 * @group Kwc_Trl
 * @group Kwc_TrlRoot
 * @group Kwc_UrlResolve

http://doleschal.kwf.niko.vivid/kwf/kwctest/Kwc_Root_TrlRoot_TestComponent/de/test
http://doleschal.kwf.niko.vivid/kwf/kwctest/Kwc_Root_TrlRoot_TestComponent/de/home_de
http://doleschal.kwf.niko.vivid/kwf/kwctest/Kwc_Root_TrlRoot_TestComponent/de/test2
http://doleschal.kwf.niko.vivid/kwf/kwctest/Kwc_Root_TrlRoot_TestComponent/de
http://doleschal.kwf.niko.vivid/kwf/kwctest/Kwc_Root_TrlRoot_TestComponent/en/test
http://doleschal.kwf.niko.vivid/kwf/kwctest/Kwc_Root_TrlRoot_TestComponent/en/test2_en
http://doleschal.kwf.niko.vivid/kwf/kwctest/Kwc_Root_TrlRoot_TestComponent/en/home_de
http://doleschal.kwf.niko.vivid/kwf/kwctest/Kwc_Root_TrlRoot_TestComponent/en
 */
class Kwc_Root_TrlRoot_Test extends Kwc_TestAbstract
{
    public function setUp()
    {
        parent::setUp('Kwc_Root_TrlRoot_TestComponent');
        $this->_root->setFilename(null);
    }

    public function testIt()
    {
        $domain = Kwf_Registry::get('config')->server->domain;

        $data = $this->_root->getPageByUrl('http://'.$domain.'/', 'de');
        $this->assertEquals('1', $data->componentId);
        $this->assertEquals('/de', $data->url);

        $data = $this->_root->getPageByUrl('http://'.$domain.'/', null);
        $this->assertEquals('1', $data->componentId);

        $data = $this->_root->getPageByUrl('http://'.$domain.'/de', 'de');
        $this->assertEquals('1', $data->componentId);

        $data = $this->_root->getPageByUrl('http://'.$domain.'/de', 'en');
        $this->assertEquals('1', $data->componentId);

        $data = $this->_root->getPageByUrl('http://'.$domain.'/de/test', 'de');
        $this->assertEquals('2', $data->componentId);
        $this->assertEquals('/de/test', $data->url);

        $data = $this->_root->getPageByUrl('http://'.$domain.'/de/test2', 'de');
        $this->assertEquals('3', $data->componentId);
        $this->assertEquals('/de/test2', $data->url);


        $data = $this->_root->getPageByUrl('http://'.$domain.'/', 'en');
        $this->assertEquals('root-en_1', $data->componentId);
        $this->assertEquals('/en', $data->url);

        $data = $this->_root->getPageByUrl('http://'.$domain.'/en', 'en');
        $this->assertEquals('root-en_1', $data->componentId);

        $data = $this->_root->getPageByUrl('http://'.$domain.'/en', 'de');
        $this->assertEquals('root-en_1', $data->componentId);

        $data = $this->_root->getPageByUrl('http://'.$domain.'/', 'en');
        $this->assertEquals('root-en_1', $data->componentId);
        $this->assertEquals('/en', $data->url);

        $data = $this->_root->getPageByUrl('http://'.$domain.'/', 'en');
        $this->assertEquals('root-en_1', $data->componentId);
        $this->assertEquals('/en', $data->url);

        $data = $this->_root->getPageByUrl('http://'.$domain.'/en/test', 'en');
        $this->assertEquals('root-en_2', $data->componentId);
        $this->assertEquals('/en/test', $data->url);

        $data = $this->_root->getPageByUrl('http://'.$domain.'/en/test2_en', 'en');
        $this->assertEquals('root-en_3', $data->componentId);
        $this->assertEquals('/en/test2_en', $data->url);
    }
}
