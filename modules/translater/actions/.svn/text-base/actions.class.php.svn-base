<?php

/**
 *
 * @package    plugin
 * @author Ivan Muller <mullerivan@gmail.com>
 */
class translaterActions extends sfActions
{

  public function executeIndex(sfWebRequest $request)
  {
    $this->form = new dcTranslaterForm();

  }

  public function executeSave(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('POST'));

    $this->form = new dcTranslaterForm();
    $this->form->save($request->getParameter('translater'));
    $this->form = new dcTranslaterForm();
    $this->getUser()->setFlash('notice', 'Los cambios se realizadon con exito');
    $this->setTemplate('index');

  }

}
