<?php
class FoodGroups extends Controller
{
    public function __construct()
    {
        $this->FoodGroupModel = $this->model('FoodGroup');
    }

    public function index()
    {
        // Get FoodGroups
        $foodGroups = $this->FoodGroupModel->getGroups();

        $data = [
            'foodGroups' => $foodGroups
        ];

        $this->view('foodGroups/index', $data);
    }

    // Add Group
    public function add()
    {
        // Check if POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST
            $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'fdgrp_cd' => $_POST['fdgrp_cd'],
                'fddrp_desc' => $_POST['fddrp_desc'],
                'fdgrp_cd_err' => '',
                'fddrp_desc_err' => ''
            ];

            // Validate cd
            if (empty($data['fdgrp_cd'])) {
                $data['fdgrp_cd_err'] = 'Please enter group cd';
            } else {
                // Check cd
                if (strlen($data['fdgrp_cd']) > 4) {
                    $data['fdgrp_cd_err'] = 'CD must be 4 characters or less.';
                } else if ($this->FoodGroupModel->findGroupByCD($data['fdgrp_cd'])) {
                    $data['fdgrp_cd_err'] = 'CD is already taken.';
                }
            }

            // Validate desc
            if (empty($data['fddrp_desc'])) {
                $data['fddrp_desc_err'] = 'Please enter group description';
            }

            // Make sure errors are empty
            if (empty($data['fdgrp_cd_err']) && empty($data['fddrp_desc_err'])) {
                // SUCCESS - Proceed to insert

                //Execute
                if ($this->FoodGroupModel->addGroup($data)) {
                    flash('group_message', 'Group Added');
                    redirect('foodgroups');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load View
                $this->view('foodgroups/add', $data);
            }
        } else {
            // IF NOT A POST REQUEST

            // Init data
            $data = [
                'fdgrp_cd' => '',
                'fddrp_desc' => '',
                'fdgrp_cd_err' => '',
                'fddrp_desc_err' => ''
            ];

            // Load View
            $this->view('foodgroups/add', $data);
        }
    }


    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Execute
            if ($this->FoodGroupModel->deleteGroup($id)) {
                // Redirect to groups
                flash('group_message', 'Group Removed');
                redirect('foodGroups');
            } else {
                die('Something went wrong');
            }
        } else {
            redirect('foodGroups');
        }
    }
}
