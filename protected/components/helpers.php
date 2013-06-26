<?php

function getReviewType($type, $plural=false)
{
	switch ($type) {
		case 'tv':
			$category = 'serie tv';
			break;
	
		case 'book':
			$category = ($plural) ? 'libri' : 'libro';
			break;
			 
		case 'movie':
			$category = 'film';
			break;
			 
		default:
			$category = ($plural) ? 'contenuti' : 'contenuto';
	}
	return $category;
}

function getHtmlVote($vote)
{
	$vote=(integer)$vote;
	$htmlVote='';
	for ($i=1; $i<=$vote/2; $i++) {
		$htmlVote .= '<i class="icon-star" style="color:#8fba3b;"></i>';
	}
	if ($vote%2 <> 0)
		$htmlVote .= '<i class="icon-star-half" style="color:#8fba3b;"></i>';
	return $htmlVote;
}