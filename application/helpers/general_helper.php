<?php

defined('BASEPATH') OR exit('No direct script access allowed!');

if ( ! function_exists('dump'))
{
    function dump($var, $label = 'Dump', $echo = true)
    {
        // Store dump in variable
        ob_start();
        var_dump($var);
        $output = ob_get_clean();

        // Custom CSS style
        $style = 'background: #282c34;
                color: #83c379;
                margin: 10px;
                padding: 10px;
                text-align: left;
                font-family: Inconsolata, Monaco, Consolas, Courier New, Courier;;
                font-size: 15px;
                border: 1px;
                border-radius: 1px;
                overflow: auto;
                border: 2px;
                -webkit-box-shadow: 5px 5px 5px #a4a4a4;';

        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", '] => ', $output);
        $output = '<pre style="'.$style.'">'.$label.' => '.$output.'</pre>';

        // Output
        if ($echo == true)
        {
            echo $output;
        } else {
            return $output;
        }
    }
}

if ( ! function_exists('remove_unknown_field'))
{
    function remove_unknown_field($raw_data, $expected_fields)
    {
        $new_data = [];
        foreach ($raw_data as $field_name => $field_value)
        {
            if ($field_value != "" && in_array($field_name, array_values($expected_fields)))
            {
                $new_data[$field_name] = $field_value;
            }
        }

        return $new_data;
    }
}

if ( ! function_exists('generate_random_string'))
{
    function generate_random_string($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++)
        {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if ( ! function_exists('incremental_year'))
{
	function incremental_year($range = 11, $year_start = '')
	{
		$year_start = ($year_start == '') ? date('Y') : $year_start;
		$year_end	= $year_start + $range;
		$years 		= range($year_start, $year_end);

		return $years;
	}
}

if ( ! function_exists('e'))
{
	function e($string)
    {
        return htmlentities($string);
    }
}

if ( ! function_exists('init_frontend_menu'))
{
	function init_frontend_menu($array, $child = FALSE)
	{
        $str = '';
        
        if (count($array))
        {
            $str .= $child == FALSE ? '<ol class="nav">' : '<ol>';

            foreach ($array as $item)
            {
                $str .= '<li id="list_'.$item['id'].'">';
                $str .= '<div>'.$item['name'].'</div>';

                if (isset($item['children']))
                {

                }
            }
        }

		return $str;
	}
}

if ( ! function_exists('get_menu'))
{
    function get_menu($array, $child = FALSE)
    {
        $ci =& get_instance();
        $is_logged_in = $ci->ion_auth->logged_in();
        $user_id = $is_logged_in == TRUE ? $ci->ion_auth->user()->row()->id : '';
        $str = '';

        if (count($array))
        {
            $str .= $child == FALSE ? '<ul class="nav navbar-nav">' : '<ul class="dropdown-menu">';

            foreach ($array as $item)
            {
                
                $active_menu = $ci->uri->segment(1) == $item['slug'] ? TRUE : FALSE;

                if (isset($item['children']) && count($item['children']))
                {
                    $str .= $active_menu ? '<li class="dropdown active">' : '<li class="dropdown">';
                    $str .= '<a class="dropdown-toggle" data-toggle="dropdown" href="'.site_url($item['slug']).'">'. e($item['name']) .'<span class="caret"></span></a>' . PHP_EOL;
                    $str .= get_menu($item['children'], TRUE);
                } else {
                    $str .= $active_menu ? '<li class="active">' : '<li>';
                    $str .= '<a href="'.site_url($item['slug']).'">' . e($item['name']) . '</a>';
                }

                $str .= '</li>' . PHP_EOL;
            }
            $str .= '</ul>' . PHP_EOL;

            if ( ! $is_logged_in)
            {
                // $str .= $active_menu ? '<li class="active">' : '<li>';
                // $str .= '<a href="'.site_url('auth/login').'">LOGIN</a>';
                // $str .= '</li>' . PHP_EOL;

                $str .= '<ul class="nav navbar-nav navbar-right">';
                $str .= '<li><a href="'.site_url('portal/register').'">REGISTER</a></li>';
                $str .= '<li><a href="" data-toggle="modal" data-target="#modal-login">SIGN IN</a></li>';
                $str .= '</ul>';
            } else {
                $str .= '<ul class="nav navbar-nav navbar-right">';
                $str .= '<li><a href="'.site_url('portal/profile/'.$user_id).'">MY PROFILE</a></li>';
                $str .= '<li><a href="'.site_url('auth/logout').'">SIGN OUT</a></li>';
                $str .= '</ul>';
            }
           
        }

        return $str;
    }
}

if ( ! function_exists('multidimensional_search'))
{
    function multidimensional_search($parents, $searched)
    { 
        if (empty($searched) || empty($parents))
        { 
            return false; 
        } 

        foreach ($parents as $key => $value)
        { 
            $exists = true; 
            foreach ($searched as $skey => $svalue)
            { 
                $exists = ($exists && IsSet($parents[$key][$skey]) && $parents[$key][$skey] == $svalue); 
            } 
            if ($exists) { return $key; } 
        } 

        return false; 
    } 
}

if ( ! function_exists('get_days'))
{
    function get_days()
    {
        $arr = array();

        $arr[] = array('id' => '1', 'text' => 'Monday');
        $arr[] = array('id' => '2', 'text' => 'Tuesday');
        $arr[] = array('id' => '3', 'text' => 'Wednesday');
        $arr[] = array('id' => '4', 'text' => 'Thursday');
        $arr[] = array('id' => '5', 'text' => 'Friday');
        $arr[] = array('id' => '6', 'text' => 'Saturday');
        $arr[] = array('id' => '7', 'text' => 'Sunday');

        return $arr;
    }
}

if ( ! function_exists('get_shift_schedule'))
{
    function get_shift_schedule()
    {
        $arr = array();

        $arr[] = array('id' => '1', 'text' => 'Opening');
        $arr[] = array('id' => '2', 'text' => 'Mid shift');
        $arr[] = array('id' => '3', 'text' => 'Closing');
        $arr[] = array('id' => '4', 'text' => 'Graveyard');
        $arr[] = array('id' => '5', 'text' => 'Flexi');

        return $arr;
    }
}

function search($array, $key, $value)
{
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }

    return $results;
}

// if ( ! function_exists('current_git_branch'))
// {
//     function current_git_branch()
//     {
//         $string_from_file = file('.git/HEAD', FILE_USE_INCLUDE_PATH);

//         $first_line = $string_from_file[0]; //get the string from the array

//         $exploded_string = explode("/", $first_line, 3); //seperate out by the "/" in the string

//         $branch_name = $exploded_string[2]; //get the one that is always the branch name

//         return $branch_name;
//     }
// }


