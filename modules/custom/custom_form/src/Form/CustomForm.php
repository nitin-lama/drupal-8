<?php

namespace Drupal\custom_form\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;



class CustomForm extends FormBase{

  public function getFormId()
  {
    return "drupal_custom_form";
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('welcome.adminsettings');
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Candidate Name:'),
      '#required' => TRUE,
      '#default_value' => $config->get('welcome_message')
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#required' => TRUE
    ];

    $form['mbnumber'] = [
      '#type' => 'tel',
      '#title' => $this->t('Mobile Number')
    ];

    $form['dob'] = [
      '#type' => 'date',
      '#title' => $this->t('DOB'),
      '#required' => TRUE
    ];

    $form['gender'] = [
      '#type' => 'select',
      '#title' => $this->t('Gender'),
      '#options' => [
        'Female' => $this->t('Female'),
        'Male' => $this->t('Male')
      ],
    ];

    $form['conf'] = [
      '#type' => 'radios',
      '#title' => 'Are you above 18 years old ?',
      '#options' => [
        'Yes' => $this->t('Yes'),
        'No' => $this->t('No')
      ],
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary'
    ];

    return $form;
  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $conn = Database::getConnection();
    $conn->insert('custom_example')->fields(
      [
        'Full_name' => $form_state->getValue('name'),
        'Email' => $form_state->getValue('email'),
        'Mobile_No' => $form_state->getValue('mbnumber'),
        'DOB' => $form_state->getValue('dob'),
        'Gender' => $form_state->getValue('gender'),
        'Adult' => $form_state->getValue('conf'),
      ]
    )->execute();
    drupal_set_message('Thank You.');
    $url = Url::fromRoute('view.candidate_custom_table.page_1');
    $form_state->setRedirectUrl($url);
  }
}
