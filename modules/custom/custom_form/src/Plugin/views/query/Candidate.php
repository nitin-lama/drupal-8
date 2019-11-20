<?php
namespace Drupal\custom_form\Plugin\views\query;

use Drupal\views\Plugin\views\query\QueryPluginBase;
use Drupal\views\ViewExecutable;
use Drupal\views\ResultRow;

/**
 * Custom_Form views query plugin which wraps calls to the custom_form API in order to
 * expose the results to views.
 *
 * @ViewsQuery(
 *   id = "custom_form",
 *   title = @Translation("Candidate"),
 *   help = @Translation("Query against the custom_form API.")
 * )
 */
class Candidate extends QueryPluginBase {

  public function ensureTable($table, $relationship = NULL) {

    return '';
  }
  public function addField($table, $field, $alias = '', $params = array()) {

    return $field;
  }

  /**
   * {@inheritdoc}
   */
  public function execute(ViewExecutable $view) {

    $conn = \Drupal::database();
    $data = [];
    $data = $conn->query("SELECT * from custom_example")->fetchAll();

      $index = 0;

      foreach ($data as $value) {
            $row['form_id'] = $value->form_id;
            $row['Full_name'] = $value->Full_name;
            $row['Email'] = $value->Email;
            $row['Mobile_No'] = $value->Mobile_No;
            $row['DOB'] = $value->DOB;
            $row['Gender'] = $value->Gender;
            $row['Adult'] = $value->Adult;
          // 'index' key is required.
          $row['index'] = $index++;
          $view->result[] = new ResultRow($row);
      }
  }


}
