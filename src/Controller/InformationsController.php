<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\Http\Response;
use Cake\View\Exception\MissingTemplateException;

//Controller for information pages e,g instruction, about, terms and privacy...
class InformationsController extends AppController{

    /**
     * Controller initialize override
     *
     * @return void
     */
    public function initialize(): void {
        parent::initialize();

        // Controller-level function/action whitelist for authentication
        $this->Authentication->allowUnauthenticated(['about', 'term', 'privacy', 'instruction']);
    }

    public function about()
    {
        //about page content block
        $contents = $this->fetchTable('Contents');
        $aboutContents = $contents
            ->find('list', [
                'keyField' => 'hint',
                'valueField' => 'content_value'
            ])
            ->where(['parent' => 'about'])  // Limit the search to about only by the parent field
            ->toArray();
        $this->set(compact('aboutContents'));

    }


    public function term()
    {
        //term content block
        $contents = $this->fetchTable('Contents');
        $termContents = $contents
            ->find('list', [
                'keyField' => 'hint',
                'valueField' => 'content_value'
            ])
            ->where(['parent' => 'term'])  // Limit the search to term only by the parent field
            ->toArray();
        $this->set(compact('termContents'));

    }

    public function privacy()
    {
        //privacy content block
        $contents = $this->fetchTable('Contents');
        $privacyContents = $contents
            ->find('list', [
                'keyField' => 'hint',
                'valueField' => 'content_value'
            ])
            ->where(['parent' => 'privacy'])  // Limit the search to term only by the parent field
            ->toArray();
        $this->set(compact('privacyContents'));

    }

    public function instruction(){
        //instruction content block
        $contents = $this->fetchTable('Contents');
        $instructionContents = $contents
            ->find('list', [
                'keyField' => 'hint',
                'valueField' => 'content_value'
            ])
            ->where(['parent' => 'instruction'])  // Limit the search to term only by the parent field
            ->toArray();
        $this->set(compact('instructionContents'));

        //Load instruction page specific images
        $contentImages = $this->fetchTable('ContentImages');
        $instructionContentImages = $contentImages
            ->find('list', [
                'keyField' => 'hint',
                'valueField' => 'image_file'
            ])
            ->where(['parent' => 'instruction'])  // Limit the search to home page only by the parent field
            ->toArray();

        $this->set(compact('instructionContentImages'));
    }


}
