<?php
/**
 * Returns HTML for a recent node to be displayed in the recent content block.
 *
 * @param $variables
 *   An associative array containing:
 *   - node: A node object.
 *
 * @ingroup themeable
 */
function themedev_node_recent_content($variables) {
  $node = $variables['node'];

  $output = '<div class="node-title">';
  $output .= "TESTING" .l($node->title, 'node/' . $node->nid);
  $output .= theme('mark', array('type' => node_mark($node->nid, $node->changed)));
  $output .= '</div><div class="node-author">';
  $output .= theme('username', array('account' => user_load($node->uid)));
  $output .= '</div>';
  $output .= '</div><div class="node-created">'; 
  $output .= format_date($node->created);
  $output .= '</div>';
  return $output;
}
function themedev_mark($variables) {
  $type = $variables['type'];
  global $user;
  if ($user->uid) {
    if ($type == MARK_NEW) {
      return ' <span class="marker">**</span>';
    }
    elseif ($type == MARK_UPDATED) {
      return ' <span class="marker">*</span>';
    }
  }
}
function themedev_preprocess_username(&$variables) {
 if (!empty($variables['account']->mail)) {
     $variables['extra'] .= ' (' .$variables['account']->mail .')';
 }
}
function themedev_process_username(&$variables) {
 $variables['extra'] = str_replace('@', '@NOSPAM.', $variables['extra']);
}
function themedev_preprocess_node(&$variables) {
 $node = $variables['node'];
  if (variable_get('node_submitted_' . $node->type, TRUE)) {
    $variables['submitted'] = t('Posted by !username on !datetime', array('!username' => $variables['name'], '!datetime' => $variables['date']));
  }
}
function themedev_preprocess_html(&$variables) {
    if ($GLOBALS['user']->uid == 1) {
        drupal_add_css(drupal_get_path('theme', 'themedev') . '/css/superadmin.css');
    }
} 
function themedev_form_alter(&$form, &$form_state, $form_id){
   
}