<div class="toggler" style="float:left;">
<div id="effect" class="ui-widget-content ui-corner-all"><img id="background" src="./img/sporen.jpg" >
<h3 class="ui-widget-header ui-corner-all">Overzicht haven</h3>

<?php
include('database.php'); 
$green="trafic-green.png";
$orange="trafic-orange.png";
$red="trafic-red.png";
?>
<!-- spoor blok -->

<script type="text/javascript">
$( document ).ready(function(){
	//------------------------------
	//------------------------------
	//-------Laatst-werkend-back-up-
	//-------21-jan-2016------------
	//---------------------------------------------------------------
	//-------------------Classen aanmaken----------------------------
	//---------------------------------------------------------------
	//-------------------------------
	//-------Controller class--------
	//-------------------------------
	function Controller(){
		//---------
		//Eigenschappen
		//---------
		this.inspoorlist = new Array();
		this.wislist = new Array();
		this.opstelspoorlist = new Array();
		this.uitspoorlist = new Array();
		this.rijtreinlist = new Array();
		this.alltreinlist = new Array();
		this.allperslist = new Array();
		
		//Object van deze class
		var thisClass = this;
		
		//---------		
		//Constructor
		//---------
		
		//Hier worden alle sporen aangemaakt.
		//Daarvoor worden eerst alle coördinaten die nodig zijn voor de animatie naar een spoor opgeslagen.
		//Vervolgens worden de sporen zelf aangemaakt en worden onder andere de zojuist aangemaakte animatie coördinaten toegevoegd aan het spoor
		//Als laatste in dit onderdeel worden alle sporen aan de array's met sporen toegevoegd.
		
		//
		// Annimatie coördinaten array's aanmaken
		//
		//Inspoor coördinaten
		var iny = 467;
		
		var in01y = [iny];
		var in01x = [-30];
		var in01 = [in01y, in01x];
		
		var in02y = [iny, iny];
		var in02x = [-30, 25];
		var in02 = [in02y, in02x];
		
		var in03y = [iny];
		var in03x = [85];
		var in03 = [in03y, in03x];
		
		var in04y = [iny];
		var in04x = [145];
		var in04 = [in04y, in04x];
		
		var in05y = [iny];
		var in05x = [205];
		var in05 = [in05y, in05x];
		
		var in06y = [iny];
		var in06x = [265];
		var in06 = [in06y, in06x];
		
		var in07y = [iny];
		var in07x = [325];
		var in07 = [in07y, in07x];
		
		var in08y = [iny];
		var in08x = [385];
		var in08 = [in08y, in08x];
		
		var in09y = [iny];
		var in09x = [445];
		var in09 = [in09y, in09x];
		
		var in10y = [iny];
		var in10x = [565];
		var in10 = [in10y, in10x];
		
		//Wissel coördinaten
		var wisy = [iny];
		var wisx = [560];
		var wis = [wisy, wisx];
		
		//Opstelspoor coördinaten
		var y = 467;
		ay = [y, y, y, 421, 374, 337, 337];
		ax = [630, 840, 1040, 1125, 1203, 1272, 1500];
		a = [ay, ax];
		
		by = [y, y, y, 421, 379, 379];
		bx = [630, 840, 1040, 1125, 1203, 1500];
		b = [by, bx];
		
		cy = [y, y, y, 422, 422];
		cx = [630, 840, 1040, 1110, 1500];
		c = [cy, cx];
		
		dy = [y, y, y, y, y];
		dx = [630, 840, 1040, 1115, 1500];
		d = [dy, dx];
		
		ey = [y, y, y, y, 511, 511];
		ex = [630, 840, 1040, 1200, 1265, 1500];
		e = [ey, ex];
		
		fy = [y, y, y, y, 549, 549];
		fx = [630, 840, 1040, 1200, 1340, 1500];
		f = [fy, fx];
		
		gy = [y, 521, 521];
		gx = [630, 710, 1110];
		g = [gy, gx];
		
		hy = [y, 79, 79];
		hx = [830, 1290, 1500];
		h = [hy, hx];
		
		iy = [y, 521, 811, 811];
		ix = [630, 710, 1100, 1500];
		i = [iy, ix];
		
		jy = [y, y, 379, 379];
		jx = [630, 840, 956, 990];
		j = [jy, jx];
		
		//uitspoor coördinaten
		var uity = 420;
		
		var uitay = [337, uity, uity];
		var uitax = [1260, 1120, -50];
		var uita = [uitay, uitax];
		
		var uitby = [379, uity, uity];
		var uitbx = [1200, 1120, -50];
		var uitb = [uitby, uitbx];
		
		var uitcy = [uity];
		var uitcx = [-50];
		var uitc = [uitcy, uitcx];
		
		var uitdy = [467, uity, uity];
		var uitdx = [1205, 1120, -50];
		var uitd = [uitdy, uitdx];
		
		var uitey = [510, uity,  uity];
		var uitex = [1275, 1120, -50];
		var uite = [uitey, uitex];
		
		var uitfy = [549, uity, uity];
		var uitfx = [1340, 1120, -50];
		var uitf = [uitfy, uitfx];
		
		var uitgy = [521, uity, uity];
		var uitgx = [710, 580, -50];
		var uitg = [uitgy, uitgx];
		
		var uithy = [79, uity, uity];
		var uithx = [1290, 880, -50];
		var uith = [uithy, uithx];
		
		var uitiy = [811,uity, uity];
		var uitix = [1100, 580, -50];
		var uiti = [uitiy, uitix];

		//
		// Objecten van sporen aanmaken
		//	
		//Inkomende sporen
		var spIn01 = new Spoor("in01", in01, "s417");
		var spIn02 = new Spoor("in02", in02, "s416");
		var spIn03 = new Spoor("in03", in03, "s415");
		var spIn04 = new Spoor("in04", in04, "s414");
		var spIn05 = new Spoor("in05", in05, "s413");
		var spIn06 = new Spoor("in06", in06, "s412");
		var spIn07 = new Spoor("in07", in07, "s411");
		var spIn08 = new Spoor("in08", in08, "s410");
		var spIn09 = new Spoor("in09", in09, "s49");
		
		//Wissel
		var wissel = new Spoor("wissel", wis, "s48");
		
		//Opstelsporen
		var spOpA = new Spoor("A", a, "s11");
		var spOpB = new Spoor("B", b, "s21");
		var spOpC = new Spoor("C", c, "s31");
		var spOpD = new Spoor("D", d, "s41");
		var spOpE = new Spoor("E", e, "s51");
		var spOpF = new Spoor("F", f, "s61");
		var spOpG = new Spoor("G", g, "s52");
		var spOpH = new Spoor("H", h, "s01");
		var spOpI = new Spoor("I", i, "s71");
		var spOpJ = new Spoor("J", j, "s24");
		
		//Uitgaande sporen
		var spUita = new Spoor("uit01", uita, "s37");
		var spUitb = new Spoor("uit01", uitb, "s37");
		var spUitc = new Spoor("uit01", uitc, "s37");
		var spUitd = new Spoor("uit01", uitd, "s37");
		var spUite = new Spoor("uit01", uite, "s37");
		var spUitf = new Spoor("uit01", uitf, "s37");
		var spUitg = new Spoor("uit01", uitg, "s37");
		var spUith = new Spoor("uit01", uith, "s37");
		var spUiti = new Spoor("uit01", uiti, "s37");
		
		//
		// Sporen aan array's toevoegen
		//
		//Inkomende sporen
		this.inspoorlist.push(spIn01);
		this.inspoorlist.push(spIn02);
		this.inspoorlist.push(spIn03);
		this.inspoorlist.push(spIn04);
		this.inspoorlist.push(spIn05);
		this.inspoorlist.push(spIn06);
		this.inspoorlist.push(spIn07);
		this.inspoorlist.push(spIn08);
		this.inspoorlist.push(spIn09);
		
		//Wissel
		this.wislist.push(wissel);
		
		//Opstelsporen
		this.opstelspoorlist.push(spOpA);
		this.opstelspoorlist.push(spOpB);
		this.opstelspoorlist.push(spOpC);
		this.opstelspoorlist.push(spOpD);
		this.opstelspoorlist.push(spOpE);
		this.opstelspoorlist.push(spOpF);
		this.opstelspoorlist.push(spOpG);
		this.opstelspoorlist.push(spOpH);
		this.opstelspoorlist.push(spOpI);
		this.opstelspoorlist.push(spOpJ);
		
		//Uitgaande sporen
		this.uitspoorlist.push(spUita);
		this.uitspoorlist.push(spUitb);
		this.uitspoorlist.push(spUitc);
		this.uitspoorlist.push(spUitd);
		this.uitspoorlist.push(spUite);
		this.uitspoorlist.push(spUitf);
		this.uitspoorlist.push(spUitg);
		this.uitspoorlist.push(spUith);
		this.uitspoorlist.push(spUiti);
		
		//---------		
		//Methodes
		//---------
		//
		// Methode wordt uitgevoerd als de website inlaadt. Activeert de methodes DatabaseConnectie(), VulTreinList() en Wacht().
		//
		
		this.Start = function(){
			// Roept de DatabaseConnectie() methode aan.
			// Deze methode roept weer VulTreinList() en Wacht() aan.
			this.VulTreinList();
			//this.Wacht();
			this.perswacht();
		}
		this.AddPersonenTrein = function(){
			// 1. Controlleert of spoor 1 niet op rood staat (inspoorlist[0].getSeinStand != "Rood")
			
			// 2. Elke heel uur en elke half uur komt er een personen trein
			
			// 3. 
			// controleren of spoor 1 niet op rood staat
		var SIn01 = this.inspoorlist[0].GetSeinStand();
		
		// if Sein 01 op rood aanmaken
		if(SIn01 != "Rood"){
			var laadtijd;
				// if all personentrein lijst leeg melding geven.
				if(this.allperslist.length == 0){
						console.log("Er zijn geen personentreinen meer in de personentreinen lijst");
					}
				// else als er nog treinen in de personentreinen lijst zijn.
				else{
					//-------------------------------
					//-------------tijd--------------
					//-------------------------------
					var actueel = new Date();
					var nu = new Date();
					nu.setSeconds(nu.getSeconds() + 30);
					
					var NrTrein = this.allperslist[0];						
					var kleur = ['trpaars'];
					var trein = new Trein(NrTrein, 'personen', laadtijd);
					trein.positie = this.inspoorlist[0];
					trein.aankomstDate = nu;
					trein.laadtijd = 3000;
					var aankomsttijd = trein.aankomstDate.toLocaleTimeString();
					
					// trein in list doen. en uit pers lijst verwijderen.
					this.rijtreinlist.push(trein);
					this.allperslist.shift(0);
					
					// maak de image aan
					var afbeelding = document.createElement("img");
					afbeelding.setAttribute("class", "start");
					afbeelding.setAttribute("id", 'trein_'+trein.id);
					afbeelding.setAttribute("src", './img/'+kleur+'.png');
					document.getElementById("effect").appendChild(afbeelding);
					
					// Maak de span aan
					var node = document.createElement("span");
					node.setAttribute("id","informatie_"+trein.id);
					node.setAttribute("class","informatie");

					// 8.2 Hoe moet de tekst uit zien
					var textnode = document.createTextNode("Personen trein: "+trein.id+"\n");
					
					// 8.3 Voeg elle tekst in 1 lijst
					node.appendChild(textnode);

					// 8.4 laat de lijst zien
					document.getElementById("informatie_").appendChild(node);
				
					// Maak de span aan vertraging.  ------------------------------------------
					var node = document.createElement("span");
					node.setAttribute("id","informatie-vertraging");
					node.setAttribute("class","informatie");

					// 8.4 laat de lijst zien vertraging
					$('#informatie-vertraging').html("Aankomsttijd: "+aankomsttijd+ "<br>");
					document.getElementById("informatie-vertraging").appendChild(node);
					trein.Rij();
				}
			}
		}
		//
		// Methode wordt uitgevoerd als er een nieuwe trein toegevoegd moet worden. Maakt alles klaar om een trein toe te voegfen, vult alle gegevens aan en voegt de trein daadwerkelijk toe aan de pagina.
		//
		this.AddTrein = function(){
			// 1. Controlleert of spoor 1 niet op rood staat (inspoorlist[0].GetSeinStand() != "Rood")
			// SIn01 dit is SeinIn01 van de inkomende sein de eerste
			
			// 2. Haalt een random trein uit de alltreinlist en stopt die in de variabele 'trein'
			
			// 3. Vult gegevens van de trein aan. 
				//3.1 Maakt de aankomstdatum aan (trein.aankomstDate = new Date();)
				//3.2 Maakt de positie aan (trein.positie = this.inspoorlist[0];)
			// 4. Verwijdert de trein uit de alltreinlist
			// 5. Voegt de trein aan de rijtreinlist toe
			// 6. Activeert de Rij() methode van de nieuwe trein (trein.Rij();)
			// 7. Zet trein visueel op het spoor
			var SIn01 = this.inspoorlist[0].GetSeinStand();
			if(SIn01 != "Rood"){
				if(this.alltreinlist.length === 0){
					console.log("Er is geen trein meer");
				}else{
					var randomNum = Math.floor((Math.random() * (this.alltreinlist.length-1)) + 0);
					var kleuren = ['trgeel', 'trblauw', 'trgroen', 'trrood'];
					var randomTrein = kleuren[Math.floor(Math.random() * kleuren.length)];
					var trein = this.alltreinlist[randomNum];
					trein.aankomstDate = new Date();
					trein.positie = this.inspoorlist[0];
					trein.isInkomend = true;
					trein.isLossend = false;
					this.alltreinlist.splice(randomNum,1);
					this.rijtreinlist.push(trein);
					//console.log(this.rijtreinlist);

					var afbeelding = document.createElement("img");
					afbeelding.setAttribute("class", "start");
					afbeelding.setAttribute("id", 'trein_'+trein.id);
					afbeelding.setAttribute("src", './img/'+randomTrein+'.png');
					document.getElementById("effect").appendChild(afbeelding);
					var node = document.createElement("span");
					node.setAttribute("id","informatie_"+trein.id);
					node.setAttribute("class","informatie");
					var textnode = document.createTextNode("Goederen trein: "+trein.id+"\n");
					node.appendChild(textnode);
					document.getElementById("informatie_").appendChild(node);
					trein.Rij();
				}
			}
		}
		//
		// Methode wordt geactiveerd als de website inlaad. Vult de alltreinlist met alle treinen in de database
		//
		this.VulTreinList = function(){
			// 1. Haalt alle treinen uit de database op
			$.post('./php/treinen.php', function(data){
				// 1.1 Stopt alle gegevens van de trein in een variabele
				
				if(data == 'connectionFailed'){
					// LAAT DE GEBRUIKER WETEN DAT ER GEEN DATABASE CONNECTIE IS
					alert('Er is geen verbinding met de Database');
				}
				else{
					// 1.2 Maakt een nieuw object van de class Trein aan met de zojuist opgehaalde gegevens
					//Het ophalen van de gegevens uit treinen.php
					var gegevens = JSON.parse(data);
					var thisTrein;

					for(var teller = 0; teller < gegevens.length; teller++){
						// 1.3 Voegt het nieuwe trein object toe aan de alltreinlist
						thisTrein = new Trein(gegevens[teller][0], gegevens[teller][1], Math.floor((Math.random() * 30000) + 25000));
						thisClass.alltreinlist.push(thisTrein);		
					}
				}
				// dit is om de data als PHP te laten zien --> data /// Javascript --> array
			});	
			for(var teller = 26; teller <= 30; teller++){
				this.allperslist.push(teller);
			}
		}
		
		//
		// Methode wordt geactiveerd als een trein verwijderd moet worden. Haalt de trein visueel weg en laat het systeem weten dat hij weer beschikbaar is voor hergebruik.
		//
		this.DeleteTrein = function(trein){
			// 1. De trein wordt visueel van de html pagina verwijderd
			
			// 2. De sporen uit05, uit06, uit07, ui08 en ui09 worden op groen gezet
			
			// 3. De trein wordt toegevoegd aan de alltreinlist
			
			// 4. De trein wordt verwijderd van de rijtreinlist
			//push is toevoegen pop is verwijderen(aan het begin)
			//-----------------------------
			//---------delete-span---------
			//-----------------------------
			var span = document.getElementById("trein_"+trein.id);
			var span = document.getElementById("informatie_"+trein.id);
			span.parentNode.removeChild(span);
			
			if(trein.soort == 'personen'){
				console.log(trein.id+" deleted");
				var index = this.rijtreinlist.indexOf(trein.id);
				this.rijtreinlist.splice(index, 1);
				this.allperslist.push(trein.id);
			}
			else{
				for(var i = 0; i < this.rijtreinlist.length; i++){
					if(this.rijtreinlist[i].id == trein.id){
						console.log(trein.id+" deleted");
						nieuwtrein = trein.id;
						soort = trein.soort;
						this.rijtreinlist.splice(i, 1);
						thisTrein = new Trein(nieuwtrein, soort, Math.floor((Math.random() * 30000) + 25000));
						this.alltreinlist.push(thisTrein);
					}
				}
			}
		}
		
		//
		// Methode wordt geactiveerd als de trein naar het volgende blok moet rijden. Activeert de SeinLogica() methode, zoekt op naar welk spoor de trein toe moet, en activeert de StartAnimatie methode van de trein
		//
		this.Volgende = function(trein){
			var volgendSpoor;
			var allspoorlist = this.inspoorlist.concat(this.uitspoorlist);
			if(trein.positie.GetSeinStand() != 'Rood'){
				
				var index = 9;
				
				switch(trein.positie.locatie){
					case 'in07':
					volgendSpoor = allspoorlist[7];
					trein.SetOpSpoor(this.opstelspoorlist);
					break;
					
					case 'in08':
					volgendSpoor = allspoorlist[8];
					break;
					
					case 'in09':
					if(this.wislist[0].GetSeinStand() == "Groen"){
						volgendSpoor = this.wislist[0];
					}else{
						trein.Wacht(1000);
						return;
					}
					break;
					
					case 'wissel':						
						switch(trein.opstelspoor.locatie){
							case 'a':
							index = 0;
							break;
							
							case 'b':
							index = 1;
							break;
							
							case 'c':
							index = 2;
							break;
							
							case 'd':
							index = 3;
							break;
							
							case 'e':
							index = 4;
							break;
							
							case 'f':
							index = 5;
							break;
							
							case 'g':
							index = 6;
							break;
							
							case 'h':
							index = 7;
							break;
							
							case 'i':
							index = 8;
							break;
							
							default:
							index = 9;
							break;
						}
						
						volgendSpoor = trein.opstelspoor;
					break;
					
					case 'J':
						index++;
					case 'I':
						index++;
					case 'H':
						index++;
					case 'G':
						index++;
					case 'F':
						index++;
					case 'E':
						index++;
					case 'D':
						index++;
					case 'C':
						index++;
					case 'B':
						index++;
					case 'A':
						if(trein.isLossend)
						{
							//
							// Trein heeft al gelost
							//
							volgendSpoor = allspoorlist[index];
							trein.isInkomend = false;
							break;							
						}
						else
						{
							//
							// Trein moet nog lossen
							//
							trein.isLossend = true;
							trein.Wacht(trein.laadtijd);
							return;
						}
					break;
					
					case 'uit01':
					this.DeleteTrein(trein);
					break;
					
					default:
					var sporen = allspoorlist.length;
					for(var i = 0; i < sporen; i++){
						if(allspoorlist[i].locatie == trein.positie.locatie){
							index = i + 1;
							volgendSpoor = allspoorlist[index];
							break;
						}
					}
					
					break;
					
				}
				if(trein.positie.locatie != 'uit01'){
					trein.StartAnimatie(volgendSpoor);
					this.SeinLogica(trein, volgendSpoor, allspoorlist);
				}
			}
			// 1. Als het huildige blok NIET op rood staat of als de trein op een opstelspoor staat, mag de code verder naar stap 2.
			
			// 2. Er wordt een nieuwe lege variabele volgendSpoor aangemaakt (var volgendSpoor;) 
			
			// 3. Controlleert op welke positie de trein nu is. Is dit op spoor 7 van het inspoor, aan het eind van het inspoor, bij de wissel, op een opstelspoor, aan het eind van het uitspoor of ergens anders?
				// 3.1. Spoor 7 van het inspoor
					// 3.1.1. Roept de OpstelspoorToewijzen(trein) methode van de controller aan
					// 3.1.2. Doet voor de rest alles wat er gebeurt bij een normaal spoor (3.6)
				// 3.2. Aan het eind van het inspoor
					// 3.2.1. Kijkt of het opstelspoor en de wissel op groen staan
						// 3.2.1.1. Als beide het opstelspoor en de wissel op groen staan wordt de wissel opgeslagen in de variabele volgendSpoor
						// 3.2.1.2. Als een van beide op rood staat, verlaat de code deze methode (return;)
				// 3.3. Bij de wissel
					// 3.3.1. Als de eigenschap isInkomend (trein.isInkomend) op 'true' staat
						// 3.3.1.1. Het opstelspoor wordt opgeslagen in de variabele volgendSpoor
					// 3.3.2 Als de eigenschap isInkomend (trein.isInkomend) op 'false' staat
						// 3.3.2.1. Het uitspoor (uit09) wordt opgeslagen in de variabele volgendSpoor
				// 3.4. Op een opstelspoor
					// 3.4.1. Als de wissel en het eerste spoor van de uitspoor op groen staan
						// 3.4.1.1. De eigenschap isInkomend wordt op 'false' gezet (trein.isInkomend = false)
						// 3.4.1.2. De wissel wordt opgeslagen in de variabele volgendSpoor
					// 3.4.2. Als of de wissel of het eerste spoor van het uitspoor op rood staat
						// 3.4.2.1. De laadtijd van de trein wordt verkort naar 1 seconde (trein.laadtijd = 1000)
						// 3.4.2.1. De code verlaat deze methode (return;)
				// 3.5. Op het uitspoor
					// 3.5.1. De methode DeleteTrein(trein) van de controller wordt aangeroepen
				// 3.6. Ergens anders
					// 3.6.1. De array's van de inspoorlist en uitspoorlist worden samengevoegd in één grote nieuwe array (var allspoorlist = inspoorlist.concat(uitspoorlist))
					// 3.6.2. Er wordt een foreach gestart op de allspoorlist
						// 3.6.2.1. De foreach zoekt het spoor waar de huildige trein op rijdt op in de lijst (if(spoor==trein.positie){})
						// 3.6.2.2. Als dit spoor gevonden is, wordt het volgende resultaat in de lijst met alle sporen opgehaald. 
						// 3.6.2.3. Dit resultaat wordt opgeslagen in de variabele volgendSpoor.
			
			// 5. De methode SeinLogica(trein, volgendSpoor) wordt geactiveerd
			
			// 6. De methode StartAnimatie(spoor) wordt gestart (trein.StartAnimatie(volgendSpoor);)
		}
		
		//
		// Methode wordt geactiveerd als een trein aan het begin van een blok staat en gaat annimeren naar het volgende blok. Regelt de stand van de seinen in het systeem.
		//
		this.SeinLogica = function(trein, volgendSpoor, allspoorlist){
			switch(trein.positie.locatie){
				case 'in01':
				trein.positie.SetSeinStand("Rood");
				break;
				
				case 'in02':
				trein.positie.SetSeinStand("Rood");
				allspoorlist[0].SetSeinStand("Rood");
				return;
				
				case 'wissel':
				allspoorlist[7].SetSeinStand("Oranje");
				allspoorlist[6].SetSeinStand("Groen");
				trein.positie.SetSeinStand("Rood");
				volgendSpoor.SetSeinStand("Oranje"); //Zet het spoor op Oranje
				allspoorlist[9].SetSeinStand("Rood"); // Uit spoor op Rood!
				setTimeout(function(){//Voorbij de wissel
					allspoorlist[7].SetSeinStand("Groen");
					allspoorlist[8].SetSeinStand("Oranje");
					allspoorlist[9].SetSeinStand("Oranje");
					setTimeout(function(){
						allspoorlist[8].SetSeinStand("Groen");
						allspoorlist[9].SetSeinStand("Groen");//Uitspoor
						trein.positie.SetSeinStand("Oranje");//Wissel
						setTimeout(function(){
							allspoorlist[9].SetSeinStand("Groen"); // uitspoor!
							trein.positie.SetSeinStand("Groen");//wissel
						}, 2000);
					}, 4000);
				}, 2000);
				break;
				
				case 'A':
				case 'B':
				case 'C':
				case 'D':
				case 'E':
				case 'F':
				case 'G':
				case 'H':
				case 'I':
				case 'J':
				this.wislist[0].SetSeinStand("Rood");
				trein.positie.SetSeinStand("Oranje");
				volgendSpoor.SetSeinStand("Rood");
				setTimeout(function(){
					trein.positie.SetSeinStand("Groen");
					volgendSpoor.SetSeinStand("Groen");
					setTimeout(function(){
						allspoorlist[9].SetSeinStand("Groen");
						thisClass.wislist[0].SetSeinStand("Groen");
					}, 8000);
				}, 16000);
				break;
				
				default:
				for(var i = 0; i < allspoorlist.length; i++){
					if(allspoorlist[i].locatie == trein.positie.locatie){
						trein.positie.SetSeinStand("Rood");
						j = i -1;
						allspoorlist[j].SetSeinStand("Rood");
						l = j -1;
						allspoorlist[l].SetSeinStand("Oranje");
						k = l -1;
						if(k >= 0){
							allspoorlist[k].SetSeinStand("Groen");
						}
						break;
					}
				}
				break;
			}
			// 1. Het huildige spoor wordt op rood gezet (trein.positie.SetSeinStand("Rood");)

			// 2. Kijkt naar de locatie van de trein met behulp van het switch statement (switch(trein.positie.locatie){}). 
				// 2.1 Trein staat op spoor in01 of in02
					// 2.1.1 Er gebeurt niets, de code verlaat deze methode (return;)
				// 2.2 Trein staat op spoor in03
					// 2.2.1 Spoor in01 wordt op oranje gezet	
				// 2.3. Trein staat op de wissel
					// 2.3.1 De trein is inkomend (trein.IsInkomend is 'true')
						// 2.3.1.1 Spoor in07 wordt op groen gezet
						// 2.3.1.2 Spoor in08 wordt op oranje gezet
						// 2.3.1.2 Spoor in09 wordt op rood gezet
					// 2.3.2 De trein is uitgaand (trein.IsInkomend is 'false')
						// 2.3.2.1 Het opstelspoor wordt op groen gezet (trein.opstelspoor.SetSeinStand("Groen");)
				// 2.4 Trein staat op het opstelspoor
					// 2.4.1 Opstelspoor wordt op rood gezet.
					// 2.4.2 Wissel wordt op groen gezet.
				// 2.5 Trein staat op spoor uit09 of uit08
					// 2.5.1 Er gebeurt niets, de code verlaat deze methode (return;)
				// 2.7 Trein staat op spoor uit07
					//2.7.1 Wissel wordt op groen gezet
					//2.7.1 Spoor uit09 wordt op oranje gezet
				// 2.8 Ergens anders
					// 2.8.1 De array's van de inspoorlist en uitspoorlist worden samengevoegd in één grote nieuwe array (var allspoorlist = inspoorlist.concat(uitspoorlist))
					// 2.8.2. Er wordt een foreach gestart op de allspoorlist
						// 2.8.2.1. De foreach zoekt het spoor waar de huildige trein op rijdt op in de lijst (if(spoor==trein.positie){}).
						// 2.8.2.2. De seistand van het vorige resultaat wordt op rood gezet.
						// 2.8.2.3. De seinstand van het resultaat daarvoor wordt op oranje gezet.
						// 2.8.2.4. De seinstand van het resultaat daar weer voor wordt op groen gezet. 
		}
		
		//
		// Methode maakt om de minuut (op 33 sec) een Personentrein inkomen.
		// 
		this.perswacht = function()
		{
			var d = new Date();
			var time = d.getUTCSeconds();
			if (time == 33 || time == 03){
				this.AddPersonenTrein();
				setTimeout(function(){
					thisClass.perswacht();	
				}, 1000);
			}else if(time == 45 || time == 55 || time == 05 || time == 15 || time == 25 || time == 35){
				thisClass.AddTrein();
				setTimeout(function(){
					thisClass.perswacht();
				}, 1000);
			}else{
				setTimeout(function(){
					thisClass.perswacht();
				}, 1000);
			}
		}
	}
	
	//-------------------------------
	//---------Trein class-----------
	//-------------------------------
	function Trein(id, soort, laadtijd){
		//---------
		//Attributen
		//---------
		//
		// Statische attributen
		//
		var thisClass = this;		// De huildige class opgeslagen
		this.id = id;				// ID van de trein
		this.soort = soort;			// Soort trein
		this.laadtijd = laadtijd;	// Laadtijd voor de trein
		var sppx100 = 20;			// Tijd per pixel met 100km/h
		var sppx40 = 40;			// Tijd per pixel met 40km/h
		
		//
		// Variabele attributen
		//
		this.isInkomend = true;		// 'true' als de trein inkomend is, anders 'false'
		this.isLossend = false;		// 'true' als de trein op dit moment aan het lossen is, anders 'false'
		this.positie;				// Huildige positie van de trein
		this.nextPos;				// Volgende positie van de trein
		this.opstelspoor;			// Opstelspoor waar de trein gaat uitladen
		this.snelheid;				// 100, 40 of 0 afhankmelijk van hoe snel de trein rijdt
		this.aankomstDate;			// De datum en tijd waarop de trein in het systeem kwam
	
		//---------		
		//Methodes
		//---------
		//
		// Methode wordt elke keer geactiveerd als de trein naar een volgend blok moet rijden. Methode activeerd de annimatie van de trein.
		//
		this.Rij = function(){
			SetSnelheid();
			if(this.snelheid != 0)
			{
				this.Volgende();
			}
			else
			{
				this.Wacht(1000);
			}
		}
		
		//
		// Methode verwijst naar een methode van de controller om het opstelspoor in te stellen
		//
		
		this.SetOpSpoor = function(){
			var seinId;
			var spoorA = '#s11';
			var spoorB = '#s21';
			var spoorC = '#s31';
			var spoorD = '#s41';
			var spoorE = '#s51';
			var spoorF = '#s61';
			var spoorG = '#s52';
			var spoorH = '#s01';
			var spoorI = '#s71';
			var wacht = '#s24';
			var sein_groen = "img/trafic-green.png";
			var sein_oranje = "img/trafic-orange.png";
			var sein_rood = "img/trafic-red.png";
			
			switch(this.soort){
				case 'container':
				if($(spoorA).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[0];
				}else if($(spoorB).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[1];
				}else if($(wacht).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[9];
				}else{
					console.log("wacht op groen");
				}
				break;
				
				case 'olie':
				case 'gas':
				//spoor C + D
				if($(spoorC).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[2];
				}else if($(spoorD).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[3];
				}else if($(wacht).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[9];
				}else if($(wacht).attr('src') == sein_oranje){
					console.log("wacht op groen");
				}
				break;
				
				case 'erts':
				//spoor E + F
				if($(spoorE).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[4];
				}else if($(spoorF).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[5];
				}else if($(wacht).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[9];
				}else if($(wacht).attr('src') == sein_oranje){
					console.log("wacht op groen");
				}
				break;
				
				case 'personen':
				//spoor G
				if($(spoorG).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[6];
				}else if($(wacht).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[7];
				}else if($(wacht).attr('src') == sein_oranje){
					console.log("wacht op groen");
				}
				break;
				
				case 'chloor':
				case 'kalk':
				//spoor H
				if($(spoorH).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[8];
				}else if($(wacht).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[9];
				}else if($(wacht).attr('src') == sein_oranje){
					console.log("wacht op groen");
				}
				break;
				
				case 'huisvuil':
				if($(spoorI).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[8];
				}else if($(wacht).attr('src') == sein_groen){
					this.opstelspoor = controller.opstelspoorlist[9];
				}else if($(wacht).attr('src') == sein_oranje){
					console.log("wacht op groen");
				}
				//spoor I
				break;
				
				default:
				break;
			}
		}
		
		//
		// Methode stelt de snelheid van de trein in afhankelijk van de locatie van de trein en de stand van het sein
		//		
		function SetSnelheid(){
			//Gebruikt het object van spoor dat opgeslagen is in locatie om te bepalen wat de stand van de sein is, om aan de hand daarvan de snelheid te bepalen.
			//LET OP: Bij het wissel moet de trein ALTIJD 40km/h rijden!
			switch(thisClass.positie.GetSeinStand())
			{
				case("Groen"):
					thisClass.snelheid = 100;
					break;
				case("Oranje"):
					thisClass.snelheid = 40;
					break;
				default:
					thisClass.snelheid = 0;
					break;				
			}
			
			
		}
		
		//
		// Methode wordt iedere keer geactiveerd als de trein naar het volgende blok gaat rijden. Activceerd de wacht methode als de trein op het opstelspoor staat, anders activeerd het de Volgende methode van de controller.
		//
		this.Volgende = function(){
			// 1. Als de trein op een laadspoor staat, wordt de wacht functie geactiveerd.
			// 2. Is die niet het geval of de trein heeft al gewacht, dan wordt de Volgende() methode van de controller geactiveerd (controller.Volgende(this);).		
			///-------------------------
			controller.Volgende(this);
			///-------------------------
		}
				
		//
		// Methode berekent de tijd die de trein moet doen over een stukje rails aan de hand van het aantal
		// pixels af te leggen keer het aantal miliseconden per pixel
		//
		// [waarde : index] = Index nummer van locatie waar de annimatie in de toMeArray is
		function GetSnelheidInMiliseconds(index){
			//
			// Gegevens klaarzetten
			//
			// Positie coördinaten
			var myLocY;									// De horizontale coördinaten van de huildige positie
			var myLocX;									// De verticale coördinaten van de huildige positie
			var nextLocY;								// De horizontale coördinaten van de volgende positie
			var nextLocX;								// De verticale coördinaten van de volgende positie
			
			// Snelheid gerelateerde variabelen
			var speedInMiliseconds;						// Snelheid in miliseconden (het uiteindelijke antwoord)

			var sppx;									// Snelheid per pixel
			
			// Af te leggen pixels
			var pixels;									// De totaal af te leggen pixels
			
			//
			// Huildige positie coördinaten en nieuwe positie coördinaten opslaan
			//
			if(index == 0)
			{
				// Als de index 0 is, gaat de trein aan zijn eerste aanimatie voor het volgende blok beginnen.
				// De start coördinaten van de trein zijn op dit moment dus de LAATSTE coördinaten van het
				// blok dat is opgeslagen als de positie van de huildige trein
				
				myLocY = thisClass.positie.toMeArray[0][thisClass.positie.toMeArray[0].length-1];
				myLocX = thisClass.positie.toMeArray[1][thisClass.positie.toMeArray[1].length-1];
			}
			else
			{
				// Als de index hoger als 0 is, is de trein al bezig in zijn animatie naar het volgende blok.
				// De start coördinaten van de trein zijn op dit moment de coördinaten die zijn opgeslagen in
				// de toMeArray van de nextPos, één locatie terug van de locatie waar we nu heen gaan.
				myLocY = thisClass.nextPos.toMeArray[0][index-1];
				myLocX = thisClass.nextPos.toMeArray[1][index-1];
			}
			
				nextLocY = thisClass.nextPos.toMeArray[0][index];
				nextLocX = thisClass.nextPos.toMeArray[1][index];
				
			//
			// Snelheid per pixel instellen
			//
			switch(thisClass.snelheid)
			{
				case(100):
					sppx = sppx100;
					break;
				case(40):
					sppx = sppx40;
					break;
				default:
					sppx = 0;
					break;			
			}
			
			// 
			// Het af te leggen aantal pixels berekenen
			//
			// Bij het berekenen van het aantal af te leggen pixels, moeten we eerst weten of de trein
			// horizontaal of vertivaal gaat rijden. Dat checken we eerst.
			if(myLocY == nextLocY)
			{
				// Als de horizontale coördinaten van de huildige en nieuwe positie aan elkaar gelijk zijn, gaat
				// de trein gewoon horizontaal rijden. Een simpele berekening voldoet dan.
				
				// De trein met het verschil tussen de huildige en vorige horizontale coördinaten af gaan leggen.
				// Dit verschil wordt hier opgeslagen.
				// Als de trein op de terugweg is, wordt dit een nagatief antwoord. Vandaar dat we de methode
				// Math.abs() gebruiken om het getal altijd positief te maken.
				pixels = Math.abs(nextLocX - myLocX);
			}
			else
			{
				// Als de horizontale coördinaten van de huildige en nieuwe positie niet aan elkaar gelijk zijn,
				// gaat de trein diagonaal rijden. Hiervoor hebben we de stelling van pytagoras nodig
				
				// Om die stelling te gebruiken moeten we twee dingen weten:
				// het horizontale en verticale verschil (de twee korte zijdes van de driehoek).
				var verticaal = Math.abs(nextLocY - myLocY);
				var horizontaal = Math.abs(nextLocX - myLocX);
				
				// En nu, alles in één keer:
				// Math.round rondt het getal af naar een heel getal.
				// Math.sqrt geeft de wortel van een getal terug.
				// Math.pow geeft de mogelijkheid om het 'tot de macht x' van een gegeven getal terug te krijgen.
				// Hierbij is het eerste getal die je meegeeft het getal dat tot de macht van iets berekent moet
				// worden, en het tweede getal is tot welke macht het getal berekent moet worden.
				// Dus, we rekenen in één regel de wortel van a kwadraat + b kwadraat uit en ronden het antwoord
				// naar een geheel getal af.
				pixels = Math.round(Math.sqrt(Math.pow(verticaal, 2) + Math.pow(horizontaal, 2)));
			}
			
			// De snelheid is nu een simpele berekening van pixels X snelheid per pixel
			speedInMiliseconds = pixels * sppx;
			return speedInMiliseconds;
		}
		
					
		this.Animatie = function(index){
			var snelheidInMiliseconden = GetSnelheidInMiliseconds(index);
			var toMeArray = this.nextPos.toMeArray;
			
			$("#trein_" +this.id).animate({
				top: toMeArray[0][index],
				left: toMeArray[1][index]
				}, 
				snelheidInMiliseconden, 
				"linear", 
				function(){
					if(toMeArray[0].length-1 > index){
						//Er is nog een volgend resultaat in de coördinaten array (de trein is nog niet bij het volgende blok)
						thisClass.Animatie(++index);
					}
					else{
						//De annimatie is voorbij. De nieuwe positie van de trein wordt definitief opgeslagen en het lproces voor de animagtie naar het volgende blok wordt opgestart met de methode Rij()
						thisClass.positie = thisClass.nextPos;
						thisClass.Rij();
					}
				}
			);
		}
		
		//
		// Methode regelt de annimatie van de trein naar het volgende blok
		//
		this.StartAnimatie = function(volgendSpoor){
			// Het volgende spoor opslaan in object
			this.nextPos = volgendSpoor;
				
			//Index klaarzetten
			var index = 0;
			
			this.Animatie(index);
		}
		
		//
		// Methode wordt geactiveerd als de trein moet wachten (stoplicht of opstelspoor). Hij wacht een bepaalde tijd en controlleert dan opnieuw of de trein verder mag rijden.
		//
		this.Wacht = function(tijd){
			setTimeout(function(){
				thisClass.Rij();
			}, tijd);
		}
		
		//
		// Methode wordt geactiveerd als de gebruiker op de trein klikt. Laat de gegevens van de trein in een apart venster zien.
		//
		this.toonDetais = function(){
			// 1. Schermpje met treingegevens wordt geopent
			
		}
		
	}
	
	//-------------------------------
	//---------Spoor class-----------
	//-------------------------------
	function Spoor(locatie, toMeArray, seinId, isOpstelSpoor){
		//---------
		//Eigenschappen
		//---------
		this.locatie = locatie;
		this.toMeArray = toMeArray;
		this.seinId = seinId;
		if(isOpstelSpoor = 'undefined'){isOpstelSpoor = false;}
		
		var sein_groen = "img/trafic-green.png";
		var sein_oranje = "img/trafic-orange.png";
		var sein_rood = "img/trafic-red.png";
		
		
		//---------		
		//Methodes
		//---------
		//
		// Methode haalt de stand van het sein op
		//
		this.GetSeinStand = function(){		
			
			switch($("#" +this.seinId).attr('src'))
			{
				case(sein_groen):
					return "Groen";
					
					break;
				case(sein_oranje):
					return "Oranje";
					
					break;
				default:
					return "Rood";
					
					break;					
			}
		}
		
		//
		// Methode veranderd de stand van het sein
		//
		this.SetSeinStand = function(seinStand){
			switch(seinStand)
			{
				case("Groen"):
					$("#" +this.seinId).attr('src', sein_groen);
					break;
				case("Oranje"):
					$("#" +this.seinId).attr('src', sein_oranje);
					break;
				default:
					$("#" +this.seinId).attr('src', sein_rood);
					break;
			}
		}
	}
	
	//---------------------------------------------------------------
	//----------------------Procedurele code-------------------------
	//---------------------------------------------------------------
	//-------------------------------
	//-------Start applicatie--------
	//-------------------------------
	//
	// Controller
	//
	//Controller aanmaken
	var controller = new Controller();
	
	//Applicatie starten
	controller.Start();
	
	$(document).on("click", ".informatie",  function(){
		var alleTreinen = controller.rijtreinlist;
		
		var idTag = $( this ).attr('id');
		
		var id = idTag.split("_")[1];
		
		alleTreinen.forEach(function(trein){
			if(trein.soort != "personen"){
				laadtijd = Math.round((trein.laadtijd - 20000) / 1000);
			}else{
				laadtijd = 3;
			}
			
		if( trein.id == id){
			var node = document.createElement("span");
			node.setAttribute("id","informatie_detail");
			node.setAttribute("class","informatie");

			// 8.3 Voeg elle tekst in 1 lijst			
			if(typeof trein.opstelspoor == "undefined"){
				$('#informatie_detail').html("soort: "+trein.soort);
			}else{
				if(trein.soort == "personen"){
					$('#informatie_detail').html("soort: "+trein.soort+ "<br> vertrekt binnen: "+ laadtijd + " minuten <br>"+"Perron: "+trein.opstelspoor.locatie);
				}else{
					$('#informatie_detail').html("soort: "+trein.soort+ "<br> laadtijd: "+ laadtijd + " minuten <br>"+"Perron: "+trein.opstelspoor.locatie);
				}
			}
			// 8.4 laat de lijst zien
			document.getElementById("informatie_detail").appendChild(node);
		}
		});
	});
});
</script>

<form name="Show" class="top">
	<input type="text" name="MouseY" value="0" size="4" style="margin-left: 50%;"> Y (top)<br>
	<input type="text" name="MouseX" value="0" size="4" style="margin-left: 50%;"> X (left)<br>
</form>

<img id="s01" src="img/<?php echo $green; ?>"><!-- SPOOR H -->
<img id="s11" src="img/<?php echo $green; ?>"><!-- SPOOR A  -->
<img id="s21" src="img/<?php echo $green; ?>"><!-- SPOOR B -->
<img id="s31" src="img/<?php echo $green; ?>"><!-- SPOOR C -->
<img id="s41" src="img/<?php echo $green; ?>"><!-- SPOOR D -->
<img id="s51" src="img/<?php echo $green; ?>"><!-- SPOOR E -->
<img id="s52" src="img/<?php echo $green; ?>"><!-- SPOOR G -->
<img id="s61" src="img/<?php echo $green; ?>"><!-- SPOOR F -->
<img id="s71" src="img/<?php echo $green; ?>"><!-- SPOOR I -->

<img id="s22" hidden src="img/<?php echo $green; ?>"><!-- wissel IN/UIT -->

<img id="s24" src="img/<?php echo $green; ?>"><!-- Wacht spoor J -->

<img id="s32" hidden src="img/<?php echo $green; ?>"><!-- WISSEL uit 6 -->
<img id="s34" hidden src="img/<?php echo $green; ?>"><!-- WISSEL uit 4 -->
<img id="s37" src="img/<?php echo $green; ?>"><!-- WISSEL uit 1 -->

<img id="s42" hidden src="img/<?php echo $green; ?>"><!-- WISSEL IN 7 -->
<img id="s43" hidden src="img/<?php echo $green; ?>"><!-- WISSEL IN 6 -->
<img id="s45" hidden src="img/<?php echo $green; ?>"><!-- WISSEL IN 4 -->
<img id="s46" hidden src="img/<?php echo $green; ?>"><!-- WISSEL IN 1 -->
<img id="s48" src="img/<?php echo $green; ?>"><!-- WISSEL IN 2 -->

<img id="s49" src="img/<?php echo $green; ?>"><!-- IN 9 -->
<img id="s410" src="img/<?php echo $green; ?>"><!-- IN 8 -->
<img id="s411" src="img/<?php echo $green; ?>"><!-- IN 7 -->
<img id="s412" src="img/<?php echo $green; ?>"><!-- IN 6 -->
<img id="s413" src="img/<?php echo $green; ?>"><!-- IN 5 -->
<img id="s414" src="img/<?php echo $green; ?>"><!-- IN 4 -->
<img id="s415" src="img/<?php echo $green; ?>"><!-- IN 3 -->
<img id="s416" src="img/<?php echo $green; ?>"><!-- IN 2 -->
<img id="s417" src="img/<?php echo $green; ?>"><!-- IN 1 -->

<!-- bordjes -->
<img id="a" src="img/A.png">
<img id="b" src="img/B.png">
<img id="c" src="img/C.png">
<img id="d" src="img/D.png">
<img id="e" src="img/E.png">
<img id="f" src="img/F.png">
<img id="g" src="img/G.png">
<img id="h" src="img/H.png">
<img id="i" src="img/I.png">
<img id="j" src="img/J.png">
</div>

<!-- gaat verder in ipcamera.php -->