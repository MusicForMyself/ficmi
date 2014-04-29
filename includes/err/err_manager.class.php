<?php
/**
 * Error manager class for logging and popping error messages
 * @package err
 */
class err_manager{

	/**
	 * Pop error message
	 * @param String $who  Who caused the error
	 * @param String $what_happened  What is the error about 
	 * @return null
	 */
	function popMessage($who =  '', $what_happened){

		echo <<< HTML
		<div id="err_modal" class="modal fade">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> $who</h4>
					</div>
					<div class="modal-body">
						<p>$what_happened</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->
HTML;

	}

	function logError($who = '', $what_happened, $pop = false){
		file_put_contents(
			'includes/err/gb.log',
			time()
			."\nError: ".$what_happened
			." \n". "Caused by: ".$who."\n\n",
			FILE_APPEND
		);
		if($pop) self::popMessage($who, $what_happened);
	}

	/**
	 * Check for errors sent via GET
	 * @see popMssage
	 */
	function checkHeaderErrors(){
		// if(isset($_GET["err"])) self::popMessage('Loading error', $_GET["err"]);
		if(isset($_GET["err"])) self::logError('Loading error', $_GET["err"], true);
	}

}

