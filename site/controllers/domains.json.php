<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Joomla\CMS\Response\JsonResponse;

class Rw_accountsControllerDomains extends JControllerLegacy {

    public function execute($task) {
        try {
            $user = JFactory::getUser();

            // Get a db connection.
            $db = JFactory::getDbo();

// Create a new query object.
            $query = $db->getQuery(true);
            $query->select($db->quoteName(array('code', 'groupname', 'areaname', 'domain', 'status')));
            $query->from($db->quoteName('#__rw_accounts_domains'));
         //   $query->where($db->quoteName('state') . ' = 1 ');
          //  $query->order('ordering ASC');

// Reset the query using our newly populated query object.
            $db->setQuery($query);

// Load the results as a list of stdClass objects (see later for more options on retrieving data).
            $results = $db->loadObjectList();

            // remove items from list if search field
          
            $results = array_values($results); // renumber array
            echo new JsonResponse($results);
        } catch (Exception $e) {
            echo new JsonResponse($e);
        }
    }

}
