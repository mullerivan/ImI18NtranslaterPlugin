<?php

/**
 * dcTranslaterForm
 *
 * @author Ivan Muller <mullerivan@gmail.com>
 */
class dcTranslaterForm extends BaseForm
{

  public function configure()
  {

    $sf_formatter_revisited = new translaterFormatter($this->getWidgetSchema());
    $this->getWidgetSchema()->addFormFormatter("translater", $sf_formatter_revisited);
    $this->getWidgetSchema()->setFormFormatterName("translater");

    $uri_message = sfConfig::get('sf_root_dir') . '/apps/' . sfConfig::get('sf_app') . '/i18n/es/messages.xml';
    $xml = simplexml_load_file($uri_message);
    $xmlIterator = new SimpleXMLIterator($xml->asXML());
    $x = 0;
    for ($xmlIterator->rewind(); $xmlIterator->valid(); $xmlIterator->next())
    {
      /* @var $each SimpleXMLIterator */
      foreach ($xmlIterator->getChildren() as $data)
      {
        foreach ($data as $key => $each)
        {
          $this->setWidget($x, new sfWidgetFormInput());
          $this->getWidget($x)->setDefault($each->target->__toString());
          $this->getWidget($x)->setLabel(false);
//          $this->getWidgetSchema()->setAttribute($x, array('class' => fmod($x, 2) ? 'odd' : 'even'));
          $x++;
        }
      }
    }
    $this->getWidgetSchema()->setNameFormat('translater[%s]');
  }

  public function save($array)
  {
    $uri_message = sfConfig::get('sf_root_dir') . '/apps/' . sfConfig::get('sf_app') . '/i18n/es/messages.xml';
    $xml = simplexml_load_file($uri_message);
    $xmlIterator = new SimpleXMLIterator($xml->asXML());
    $x = 0;
    for ($xmlIterator->rewind(); $xmlIterator->valid(); $xmlIterator->next())
    {
      foreach ($xmlIterator->getChildren() as $data)
      {
        foreach ($data as $key => $each)
        {
          $each->target = $array[$x];
          $x++;
        }
      }

      $xmlIterator->saveXML($uri_message);
      $cacheDir = sfConfig::get('sf_cache_dir') . '/';
      sfToolkit::clearDirectory($cacheDir);
    }

  }

}