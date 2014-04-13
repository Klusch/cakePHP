<?php

class JSSubmitHelper extends AppHelper {

    public function enter($formname) {
        return "<script>
           (function execute() {
              $('#submitTileId').click(function() {
                   $('#".$formname."').submit()
              })
           })();

           $('#".$formname."').keypress(function(e) {
              if (e.keyCode == 13) {
                 $('#".$formname."').submit()
              }
           });
        </script>";
    }

}

?>
