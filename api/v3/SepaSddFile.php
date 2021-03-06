<?php
/*-------------------------------------------------------+
| Project 60 - SEPA direct debit                         |
| Copyright (C) 2013-2014 TTTP                           |
| Author: X+                                             |
+--------------------------------------------------------+
| This program is released as free software under the    |
| Affero GPL license. You can redistribute it and/or     |
| modify it under the terms of this license which you    |
| can read by viewing the included agpl.txt or online    |
| at www.gnu.org/licenses/agpl.html. Removal of this     |
| copyright header is strictly prohibited without        |
| written permission from the original author(s).        |
+--------------------------------------------------------*/


/**
 * File for the CiviCRM APIv3 sepa_sdd_file functions
 *
 * @package CiviCRM_SEPA
 *
 */


/**
 * Add an SepaSddFile for a contact
 *
 * Allowed @params array keys are:
 *
 * @example SepaSddFileCreate.php Standard Create Example
 *
 * @return array API result array
 * {@getfields sepa_sdd_file_create}
 * @access public
 */
function civicrm_api3_sepa_sdd_file_create($params) {
  return _civicrm_api3_basic_create(_civicrm_api3_get_BAO(__FUNCTION__), $params);
}

/**
 * Adjust Metadata for Create action
 * 
 * The metadata is used for setting defaults, documentation & validation
 * @param array $params array or parameters determined by getfields
 */
function _civicrm_api3_sepa_sdd_file_create_spec(&$params) {
  $params['reference']['api.required'] = 1;
  $params['filename']['api.required'] = 1;
  $params['created_date']['api.default'] = "now";
  $params['created_id']['api.default'] = "user_contact_id";
}

/**
 * Deletes an existing SepaSddFile
 *
 * @param  array  $params
 *
 * @example SepaSddFileDelete.php Standard Delete Example
 *
 * @return boolean | error  true if successfull, error otherwise
 * {@getfields sepa_sdd_file_delete}
 * @access public
 */
function civicrm_api3_sepa_sdd_file_delete($params) {
  return _civicrm_api3_basic_delete(_civicrm_api3_get_BAO(__FUNCTION__), $params);
}

/**
 * Retrieve one or more sepa_sdd_files
 *
 * @param  array input parameters
 *
 *
 * @example SepaSddFileGet.php Standard Get Example
 *
 * @param  array $params  an associative array of name/value pairs.
 *
 * @return  array api result array
 * {@getfields sepa_sdd_file_get}
 * @access public
 */
function civicrm_api3_sepa_sdd_file_get($params) {

  return _civicrm_api3_basic_get(_civicrm_api3_get_BAO(__FUNCTION__), $params);
}

function _civicrm_api3_sepa_sdd_file_generatexml_spec(&$params) {
  $params['id']['api.required'] = 1;
}

function civicrm_api3_sepa_sdd_file_generatexml($params) {
//fetch the file, then the group
  $file = new CRM_Sepa_BAO_SEPASddFile();
  $file->generateXML($params["id"]);
}
