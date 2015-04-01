<?php
class qa_html_theme_layer extends qa_html_theme_base {
	var $featured_questions;
	function doctype() {
		
		$featured = qa_opt ( 'featured_questions_list' );
		$featured_answers = array();
		
		if (qa_opt ( 'fa_enabled' ) && array_key_exists ( 'q_view', $this->content )) {
			
			$featured = explode ( ',', $featured );
			
			foreach ( $this->content ['a_list'] ['as'] as $idx => $answer ) {
				if (in_array ( $answer ['raw'] ['handle'], $featured )) {
					$featured_answers[$idx] = $answer;
					unset ($featured_answers[$idx]['vote_view']);
					unset ($this->content['a_list']['as'][$idx]);
				}
			}
			
			array_unshift ( $this->content ['a_list'] ['as'], $featured_answers[$idx] );
			
			// Used in q_list() function below to add css to the first featured answers.
			$this->featured_questions = count ( $featured_answers );
		}
	}
	
	// theme replacement functions
	function a_list($a_list) {
		if (isset ( $a_list ['as'] ))
			foreach ( $a_list ['as'] as $idx => $q_item )
				if ($idx < $this->featured_questions)
					$a_list ['as'] [$idx] ['classes'] = @$a_list ['as'] [$idx] ['classes'] . ' qa-a-list-answer-featured ';
				else
					break;
		qa_html_theme_base::a_list ( $a_list );
	}
	function head_custom() {
		$this->output ( '<style>', qa_opt ( 'featured_question_css' ), '</style>' );
		qa_html_theme_base::head_custom ();
	}
}
