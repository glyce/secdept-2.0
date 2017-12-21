<?php
    echo get_ol($pages);

    function get_ol($array, $child = FALSE)
    {
        $str = '';

        if (count($array)) {
            $str .= $child == FALSE ? '<ol class="sortable">' : '<ol>';

            foreach ($array as $item) {
                $str .= '<li id="list_'.$item['id'].'">';
                $str .= '<div>' . $item['name'] . '</div>';
                
                if (isset($item['children']) && count($item['children'])) {
                    $str .= get_ol($item['children'], TRUE);
                }

                $str .= '</li>' . PHP_EOL;
            }

            $str .= '</ol>' . PHP_EOL;
        }

        return $str;
    }
?>

<script src="<?php echo site_url('assets/libs/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo site_url('assets/js/jquery.nestedsortable.js'); ?>"></script>

<script>
    $(document).ready(function(){

		$('.sortable').nestedSortable({
			handle: 'div',
			items: 'li',
			toleranceElement: '> div'
		});

	});
</script>