<?php

 namespace Drupal\simple_form\Form;
 use Drupal\Core\Form\FormBase;
 use Drupal\Core\Form\FormStateInterface;



class SimpleForm extends FormBase{
  public function getFormId(){
    return "Drupal Simple Form";
  }

  public function buildForm(array $form, FormStateInterface $form_state){
      $form['number_1'] = [
        '#type' => 'textfield',
        '#title' => $this->t('First Number')
      ];

      $form['number_2'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Second Number')
      ];

      $form['submit'] = [
        '#type' => 'submit',
        '#value' => $this->t('Calculate')
      ];

      return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state){
    drupal_set_message($form_state->getvalue('number_1')+$form_state->getvalue('number_2'));
  }
}
