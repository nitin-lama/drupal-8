      <?php

      /**
       * Implements hook_views_data().
       */
      function custom_form_views_data() {
        $data = [];
        // Base data.
        $data['custom_example']['table']['group'] = t('Custom Form Table');
        $data['custom_example']['table']['base'] = [
          'title' => t('Custom Form Table'),
          'help' => t('Table to view custom_example table data in the view.'),
          'query_id' => 'custom_form',
        ];

      // Fields.
      $data['custom_example']['form_id'] = [
        'title' => t('Form ID'),
        'help' => t('Candidate ID'),
        'field' => [
          'id' => 'numeric',
        ],
      ];
      $data['custom_example']['Full_name'] = [
        'title' => t('Full Name'),
        'help' => t('Candidates Full name.'),
        'field' => [
          'id' => 'standard',
        ],
      ];
      $data['custom_example']['Email'] = [
        'title' => t('Email'),
        'help' => t('Candidate email address.'),
        'field' => [
          'id' => 'standard',
        ],
      ];
      $data['custom_example']['Mobile_No'] = [
        'title' => t('Mobile No.'),
        'help' => t('Candidate Mobile no.'),
        'field' => [
          'id' => 'numeric',
        ],
      ];
      $data['custom_example']['DOB'] = [
        'title' => t('Date of Birth'),
        'help' => t('Candidate Date of Birth.'),
        'field' => [
          'id' => 'standard',
        ],
      ];
      $data['custom_example']['Gender'] = [
        'title' => t('Gender'),
        'help' => t('Candidate Gender.'),
        'field' => [
          'id' => 'standard',
        ],
      ];
      $data['custom_example']['Adult'] = [
        'title' => t('Adult'),
        'help' => t('Candidate above 18.'),
        'field' => [
          'id' => 'standard',
        ],
      ];

  return $data;

  }
