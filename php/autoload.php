<?php
    function linkTo($url) {
        echo '
			<script>
				location.href = "'.$url.'";
			</script>
		';
    }
    function alert($message) {
        echo '
            <script>
                alert("'.$message.'");
            </script>
        ';
    }