<?php echo validation_errors(); ?>

<?php echo form_open('add_todo'); ?>

<label for="summary">Task Description:</label><br />
<input type="text" name="summary" id="summary" value="" size="50" /><br />

<label for="day">Needs to be completed by:</label><br />
<input type="text" name="day" id="day" value="<?php echo date("Y-m-d"); ?>" size="10" /><input type="text" name="hour" id="hour" value="<?php echo date("H:i"); ?>" size="10" maxlength="10"/><br />

<div id="form_button"><input type="submit" value="Add To-do" /></div>

</form>
