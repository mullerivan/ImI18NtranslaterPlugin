<?php use_helper('I18N', 'Date', 'JavascriptBase') ?>

<div id="sf_admin_container">
  <?php include_partial('translater/flashes') ?>
  <?php echo __('Search') ?>: <input type="text" id="input_serchable" value="" onChange="search"> </input>
  <form action="<?php echo url_for('translater/save') ?> " method="POST">
      <?php echo strtr($form->getWidgetSchema()->getFormFormatter()->getDecoratorFormat(), array("%content%" => (string) $form)) ?>
    <input type="submit" value="<?php echo __('Save') ?>"> </input>
  </form>

</div>



<style>
  #serchable input{
    margin: 10px 10px 10px 10px;
    width: 350px;
  }
  #input_serchable{
    height: 25px;
    width: 300px;
    background-color: lightblue;
  }
</style>
<script>
  $(document).ready(function(){
    $('#input_serchable').keyup(function(){
      search($(this).val());
    });
  });

  function search(value){

    jQuery('#serchable input').filter(function() {
      return ($(this).val().indexOf(value) == -1);
    }).hide();

    jQuery('#serchable input').filter(function() {
      return ($(this).val().indexOf(value) >= 0);
    }).show();


    if (value.length == 0) {
      jQuery('#serchable input').show();
    }
  }

</script>







