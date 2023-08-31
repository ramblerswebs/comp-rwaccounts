<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Rwaccounts\Component\Rw_accounts\Site\View\Domains;

// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\JsonView as BaseJsonView;
use Joomla\CMS\Response\JsonResponse;
use Joomla\CMS\Factory as JFactory;

class JsonView extends BaseJsonView {

    public function display($tpl = null) {
        try {

            // Get a db connection.
            // $this->state = $this->get('State');
            // $this->items = $this->get('Items');

            $db = JFactory::getDbo();
            // Create a new query object.
            $query = $db->getQuery(true);
            $query->select($db->quoteName(array('code', 'groupname', 'areaname', 'domain', 'status')));
            $query->from($db->quoteName('#__rw_accounts_domains'));
            $query->where($db->quoteName('state') . ' = 1 ');
            //  $query->order('ordering ASC');
            // Reset the query using our newly populated query object.
            $db->setQuery($query);
            $results1 = $db->loadObjectList();
            // remove items from list if search field
            $results = array_values($results1); // renumber array
            echo new JsonResponse($results);
        } catch (Exception $e) {
            echo new JsonResponse($e);
        }
    }

}