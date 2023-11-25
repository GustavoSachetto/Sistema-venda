<?php 
    function alerta ($title, $text, $icon) {
        echo "
        <script>
            $(document).ready(function () {
                if ($('body').attr('class') == 'dark') {
                    background = '#383838';
                } else {
                    background = '#FFFFFF';
                }
        
                Swal.fire({
                    title: '$title',
                    text: '$text',
                    background: background,
                    color: 'var(--title-color)',
                    icon: '$icon'
                });   
            });
        </script>";
    }
?>