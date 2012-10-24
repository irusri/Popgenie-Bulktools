<?php
/* Popgenie initial ID detector */
/**
 * This script will search any version of ids in the popgenie database.
 *
 * @author     Chanaka Mannapperuma <irusri@gmail.com>
 * @date	   2012-02-27
 * @version    beta 1.0
 * @usage      checkidtype($primaryGene);
 * @link       http://irusri.com
 */
header('Cache-Control: no-cache');
header('Pragma: no-cache');

/**unit test following ids**/
//$primaryGene="18237001_peptide";
//$primaryGene="scaffold_12";
//$primaryGene="GO:0004190"; 
//$primaryGene="POPTR_0001s28340";
//$primaryGene="POPTRDRAFT_641469";
//$primaryGene="AT4G17760.1";
//$primaryGene="KOG1864";
//$primaryGene="PTHR11514";
//$primaryGene="K00616";
//$primaryGene="PF02991";
//$primaryGene="fdfdfdf";


function checkidtype($primaryGene){
	//Check transcriptID
	if(checkprefix($primaryGene,"POPTR_")==true){
		if(strpos($primaryGene,'.') !== false){
			return "TranscriptName";
		}else{
			return "Locus";
		}
	 }
	//Check ATG
	if(checkprefix($primaryGene,"AT")==true && strpos($primaryGene,'.') == true){
			return "atg";
	 }
	//Check PANTHER
	if(checkprefix($primaryGene,"PTHR")==true){
			return "PANTHER";
	 }
	//Check PU
	if(checkprefix($primaryGene,"PU")==true){
			return "PU";
	 }
	//Check PFAM
	if(checkprefix($primaryGene,"PF")==true){
			return "PFAM";
	 }
	//Check Ensemblid
	if(checkprefix($primaryGene,"POPTRDRAFT_")==true){
			return "ensemblid";
	 }
	//Check K00id
	if(checkprefix($primaryGene,"K0")==true){
			return "KO";
	 }
	//Check KOG
	if(checkprefix($primaryGene,"KOG")==true){
			return "KOG";
	 }
	//Check GO-ID
	if(checkprefix($primaryGene,"GO:")==true){
		return "GO";
	}
	//Check Chromosome
	if(checkprefix($primaryGene,"scaffold_")==true){
		return "Cromosome";
	}
	//Check Protein name
	if(checksuffix($primaryGene,"_peptide")==true){
		return "PeptideName";
	}
}

#####################################
//Check prefix
#####################################
function checkprefix($source, $prefix) {
    if (str_startswith($source, $prefix)) {
       return true;
    } else {
       return false;
    }
}
function str_startswith($source, $prefix)
{
   return strncmp($source, $prefix, strlen($prefix)) == 0;
}
/////////////////////////////////////


#####################################
//Check suffix
#####################################
function checksuffix($source, $suffix) {
    if (str_endswith($source, $suffix)) {
       return true;
    } else {
       return false;
    }
}
function str_endswith($source, $suffix) {
   return (strpos(strrev($source), strrev($suffix)) === 0);
}
/////////////////////////////////////


?>