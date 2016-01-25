<!DOCTYPE html>
<html>
<head>
	<title>Cytoscape.js</title>
	<style type="text/css">
	#cy { height: 1000px;
	 width: 1000px;
	 background-color: #f9f9f9;}
	</style>
	<script src="jquery-1.11.3.js"></script>
	<script src="cytoscape.js"></script>
	<script src="foograph.js"></script>
	<script src="rhill-voronoi-core.js"></script>
	<?php
	echo "<script>";
		echo "$(function(){";
			echo "cytoscape({";
				echo "container: document.getElementById('cy'),";
				echo "style: [";
					//node neuron
					echo "{ selector: 'node[label = \"neuron\"]',";
					echo "css: {'background-color': '#6FB1FC', 'content': 'data(name)'}},";
					//node neuronPil
					echo "{ selector: 'node[label = \"neuronPil\"]',";
					echo "css: {'background-color': '#FF0000', 'content': 'data(name)' , 'shape': 'diamond'}},";
					echo "{ selector: 'edge[relationship = \"1\"],[relationship = \"2\"]',";
					echo "css: {'width':'3.0', 'line-color': '#00CD80', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"3\"],[relationship = \"4\"]',";
					echo "css: {'width':'3.0', 'line-color': '#33CC33', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"5\"],[relationship = \"6\"]',";
					echo "css: {'width':'3.0', 'line-color': '#FFA64F', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"7\"],[relationship = \"8\"]',";
					echo "css: {'width':'3.0', 'line-color': '#D9BFD9', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"9\"],[relationship = \"10\"]',";
					echo "css: {'width':'3.0', 'line-color': '#80FF00', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"11\"],[relationship = \"12\"]',";
					echo "css: {'width':'3.0', 'line-color': '#FFFF00', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"13\"],[relationship = \"14\"]',";
					echo "css: {'width':'3.0', 'line-color': '#ED7842', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"15\"],[relationship = \"16\"]',";
					echo "css: {'width':'3.0', 'line-color': '#33CC33', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"17\"],[relationship = \"18\"]',";
					echo "css: {'width':'3.0', 'line-color': '#4069E0', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"19\"],[relationship = \"20\"]',";
					echo "css: {'width':'3.0', 'line-color': '#00FB9A', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"21\"],[relationship = \"22\"]',";
					echo "css: {'width':'3.0', 'line-color': '#8FEE8F', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"23\"],[relationship = \"24\"]',";
					echo "css: {'width':'3.0', 'line-color': '#78C754', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"25\"],[relationship = \"26\"]',";
					echo "css: {'width':'3.0', 'line-color': '#47D1CC', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"27\"],[relationship = \"28\"]',";
					echo "css: {'width':'3.0', 'line-color': '#EDDB82', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"29\"],[relationship = \"30\"]',";
					echo "css: {'width':'3.0', 'line-color': '#8270FF', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"31\"],[relationship = \"32\"]',";
					echo "css: {'width':'3.0', 'line-color': '#6BE338', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"33\"],[relationship = \"34\"]',";
					echo "css: {'width':'3.0', 'line-color': '#D1B58C', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"35\"],[relationship = \"36\"]',";
					echo "css: {'width':'3.0', 'line-color': '#CC8540', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"37\"],[relationship = \"38\"]',";
					echo "css: {'width':'3.0', 'line-color': '#003DF5', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"39\"],[relationship = \"40\"]',";
					echo "css: {'width':'3.0', 'line-color': '#D1D100', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"41\"],[relationship = \"42\"]',";
					echo "css: {'width':'3.0', 'line-color': '#BFFF3D', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"43\"],[relationship = \"44\"]',";
					echo "css: {'width':'3.0', 'line-color': '#59C461', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"45\"],[relationship = \"46\"]',";
					echo "css: {'width':'3.0', 'line-color': '#ED7521', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"47\"],[relationship = \"48\"]',";
					echo "css: {'width':'3.0', 'line-color': '#33CCFF', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"49\"],[relationship = \"50\"]',";
					echo "css: {'width':'3.0', 'line-color': '#FFA64F', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"51\"],[relationship = \"52\"]',";
					echo "css: {'width':'3.0', 'line-color': '#8C7354', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"53\"],[relationship = \"54\"]',";
					echo "css: {'width':'3.0', 'line-color': '#00CFD1', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"55\"],[relationship = \"56\"]',";
					echo "css: {'width':'3.0', 'line-color': '#00BFFF', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"57\"],[relationship = \"58\"]',";
					echo "css: {'width':'3.0', 'line-color': '#FFB5C4', 'content': 'data(relationship)'}},";
					echo "{ selector: 'edge[relationship = \"59\"]',";
					echo "css: {'width':'3.0', 'line-color': '#D3D3D3', 'content': 'data(relationship)'}},";
						//$file_name = "5HT1A-F-700020.txt";
						$file_name = $_GET['neuron'];
						if(isset($_GET["select_zone"]))$select_zone = $_GET["select_zone"];
						else $select_zone[0]=60;
					    $nodelist = fopen("nodelist.txt", "r");
						//$output = fopen("0820test.html", "w");
						$input = fopen($file_name, "r");
						$totalEdge = 0;
						$totalNode = 0;
						$counter = 0;
						$skip = 0;
						for($i=0; $i<22893; $i++) $list[$i] = 0;
						for($i=0; $i<22893; $i++) {
							$buffer = fgets($nodelist, 20);
							sscanf($buffer, "%s\n", $node[$i]);
						}
						if( $select_zone[0] != 59 ) {
							while(($buffer = fgets($input, 50)) != false) {
								sscanf($buffer, "%s %s %d\n", $nodeA, $nodeB, $interaction);
								if( $interaction == 59 ) break;
								if( $skip == $interaction ) continue;
								do {
									if( $select_zone[0] == 60 ) break;
									for($i=0; $i<Count($select_zone); $i++) {
										if( $select_zone[$i] == $interaction ) break;
										else if( $i == Count($select_zone)-1 ) $skip = $interaction;
									}
								} while(false);
								if( $skip == $interaction ) continue;
								$z = 0;
								for($i=0; $i<22893; $i++) {
									if( $nodeA == $node[$i] ) {
										$list[$i] = 1;
										$z++;
										$network[$totalEdge]['nodeAid'] = $i;
										if($z == 2) break;
									}
									if( $nodeB == $node[$i] ) {
										$list[$i] = 1;
										$z++;
										$network[$totalEdge]['nodeBid'] = $i;
										if($z == 2) break;
									}
								}
								$network[$totalEdge]['nodeA'] = $nodeA;
								$network[$totalEdge]['nodeB'] = $nodeB;
								$network[$totalEdge]['interaction'] = $interaction;
								$totalEdge++;
							}
						}
						else {
							while(($buffer = fgets($input, 50)) != false) {
								sscanf($buffer, "%s %s %d\n", $nodeA, $nodeB, $interaction);
								if( $interaction != 59 ) continue;
								$z = 0;
								for($i=0; $i<22835; $i++) {
									if( $nodeA == $node[$i] ) {
										$list[$i] = 1;
										$z++;
										$network[$totalEdge]['nodeAid'] = $i;
										if($z == 2) break;
									}
									if( $nodeB == $node[$i] ) {
										$list[$i] = 1;
										$z++;
										$network[$totalEdge]['nodeBid'] = $i;
										if($z == 2) break;
									}
								}
								$network[$totalEdge]['nodeA'] = $nodeA;
								$network[$totalEdge]['nodeB'] = $nodeB;
								$network[$totalEdge]['interaction'] = $interaction;
								$totalEdge++;
							}
						}
						for($i=0; $i<22893; $i++) { if($list[$i] == 1) $totalNode++; }
						echo "{ selector: 'node[name = \"".($network[0]['nodeA'])."\"]',";
						echo "css: {'background-color': '#999900', 'width': '100.0', 'height': '100.0'}}],";
						
						echo "elements: { nodes: [";
						for($i=0; $i<22893; $i++) {
							if($list[$i] != 1) continue;
							$counter++;
							if($i > 22834) {
								if($counter < $totalNode) echo "{data: {id: '".$i."', name: '".$node[$i]."', label: 'neuronPil'}},";
								else {
									echo "{data: {id: '".$i."', name: '".$node[$i]."', label: 'neuronPil'}}],";
									break;
								}
							}
							echo "{data: {id: '".$i."', name: '".$node[$i]."', label: 'neuron'}},";
						}
						if( $select_zone[0] == 59 ) echo "],";
						echo "edges: [";
						for($i=0; $i<$totalEdge-1; $i++) 
							echo "{data: {source: '".$network[$i]['nodeAid']."', target: '".$network[$i]['nodeBid']."', relationship: '".$network[$i]['interaction']."'}},";
						echo "{data: {source: '".$network[$i]['nodeAid']."', target: '".$network[$i]['nodeBid']."', relationship: '".$network[$i]['interaction']."'}}]},";
				
				echo "layout: { name: 'spread'}";
			echo "});";
		echo "});";
	echo "</script>";
	?>
</head>
<body>
	<div id="cy"></div>
</body>
</html>