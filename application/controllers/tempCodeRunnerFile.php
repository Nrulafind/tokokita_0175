<?php
public function stopword()
	{

		//stopword
		$sentence = 'Perekonomian Indonesia sedang dalam pertumbuhan ';
		$stopWordRemoverFactory = new \Sastrawi\StopWordRemover\StopWordRemoverFactory();
		$stopword = $stopWordRemoverFactory->createStopWordRemover();
		$outputstopword = $stopword->remove($sentence);
		echo $outputstopword;
	}