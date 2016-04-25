<div class="modal fade" id="modal-location" backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">¿De dónde es usted?</h4>
      </div>
      <div class="modal-body">
        <h3>Por favor, selecciona tu ubicación correcta</h3>
        <p>Es indispensable, tomaremos este dato para brindarte los planes indicados en su región.</p>

        <select name="province" id="select-province" class="form-control">
          <option value="0">Seleccione una opcion</option>

          <? foreach ($location->provinces as $i =>  $province) { ?>
            <option value="<? echo $i; ?>"><? echo $province; ?></option>
          <? } ?>
        </select>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->