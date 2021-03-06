<?php
class qa_fa_admin {
	function option_default($option) {
		switch ($option) {
			case 'featured_answer_css' :
				return '
.qa-a-list-answer-featured {
    background-color:#FEAC02;
}
';
			case 'fa_enabled' :
				return 1;
				break;
			default :
				return null;
		}
	}
	function allow_template($template) {
		return ($template != 'admin');
	}
	function admin_form(&$qa_content) {
		
		// Process form input
		$ok = null;
		
		if (qa_clicked ( 'featured_answer_save' )) {
			qa_opt ( 'featured_answer_list', qa_post_text ( 'featured_answer_list' ) );
			qa_opt ( 'featured_answer_css', qa_post_text ( 'featured_answer_css' ) );
			qa_opt('fa_enabled' ,    (bool)qa_post_text('fa_enabled'));
			
			$ok = qa_lang ( 'admin/options_saved' );
		}
		
		// Create the form for display
		
		$fields = array ();
		
		$fields['fa_enabled'] = array(
				'label' => 'Enable featured answers plugin.',
				'tags'  => 'NAME="fa_enabled" id="fa_enabled"',
				'value' => qa_opt('fa_enabled'),
				'type'  => 'checkbox',
		);
		
		$fields [] = array (
				'label' => 'Featured question ids',
				'tags' => 'NAME="featured_answer_list"',
				'value' => qa_opt ( 'featured_answer_list' ),
				'type' => 'text',
				'note' => 'Put user names of those users you want to feature answers, separate with commas (e.g. MrExpertA,MrExpertB)' 
		);
		$fields [] = array (
				'label' => 'Custom css:',
				'tags' => 'NAME="featured_answer_css"',
				'value' => qa_opt ( 'featured_answer_css' ),
				'rows' => 10,
				'type' => 'textarea' 
		);
		return array (
				'ok' => ($ok && ! isset ( $error )) ? $ok : null,
				
				'fields' => $fields,
				
				'buttons' => array (
						array (
								'label' => qa_lang_html ( 'main/save_button' ),
								'tags' => 'NAME="featured_answer_save"' 
						) 
				) 
		);
	}
}
