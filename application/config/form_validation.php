<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'students/register' => array(
        [
            'field' => 'first_name',
            'label' => 'Firstname',
            'rules' => 'trim|required'
        ],
        [
            'field' => 'surname',
            'label' => 'Surname',
            'rules' => 'trim|required'
        ],
        [
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required|max_length[15]|regex_match[/^[a-zA-Z0-9]*$/]'
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|is_unique[students.email]', ['is_unique' => '%s is already taken']
        ],
        [
            'field' => 'gender',
            'label' => 'Gender',
            'rules' => 'required', ['required' => '%s is required']
        ],
        [
            'field' => 'phone_no',
            'label' => 'Phone Number',
            'rules' => 'trim|required|max_length[11]|numeric', ['required' => '%s is required']
        ],
        [
            'field' => 'date_of_birth',
            'label' => 'Date of birth',
            'rules' => 'required', ['required' => '%s is required']
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required', ['trim|required|min_length[8]' => '%s is required']
        ],
        [
            'field' => 'password-repeat',
            'label' => 'Password-conf',
            'rules' => 'trim|required|matches[password]'
        ]
    ),
    'students/update' => array(
        [
            'field' => 'first_name',
            'label' => 'Firstname',
            'rules' => 'trim|required'
        ],
        [
            'field' => 'surname',
            'label' => 'Surname',
            'rules' => 'trim|required'
        ],
        [
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required|max_length[15]|regex_match[/^[a-zA-Z0-9]*$/]'
        ],
        [
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|is_unique[students.email]', ['is_unique' => '%s is already taken']
        ],
        [
            'field' => 'gender',
            'label' => 'Gender',
            'rules' => 'required', ['required' => '%s is required']
        ],
        [
            'field' => 'phone_no',
            'label' => 'Phone Number',
            'rules' => 'trim|required|max_length[11]|numeric', ['required' => '%s is required']
        ],
        [
            'field' => 'date_of_birth',
            'label' => 'Date of birth',
            'rules' => 'required', ['required' => '%s is required']
        ],
        [
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required', ['trim|required|min_length[8]' => '%s is required']
        ],
        [
            'field' => 'password-repeat',
            'label' => 'Password-conf',
            'rules' => 'trim|required|matches[password]'
        ]
    )
);