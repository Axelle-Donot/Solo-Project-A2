<main>
	<div id="vador_phone">
		<img src="./img/materials/vador_phone.jpg" alt="Contact" />
	</div>

	<h1 class="pagetitre">Informations société&nbsp;:</h1>

	<div class="address">
		<div>
			<h2>Adresse&nbsp;:</h2>
			<address>
				<p>IUT de Montpellier Sète</p>
				<p>99 avenue d'Occitanie</p>
				<p>Bâtiment K (la zone)</p>
				<p>34090 Montpellier Cedex 5</p>
				<p>Email&nbsp;: <a href="mailto:solo@gmail.com" target="_blank">solo@gmail.com</a></p>
			</address>
		</div>
		<iframe id="ex" title="ex ex" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d916.469049447075!2d3.852973191446914!3d43.636055699160764!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe71ac4369b4c6da2!2sInformatique%20-%20IUT%20MONTPELLIER!5e1!3m2!1sfr!2sfr!4v1607858404719!5m2!1sfr!2sfr" width="512" height="350"  style="border:0;" aria-hidden="false" tabindex="0">
		</iframe>
	</div>

	<h1 class="pagetitre">Formulaire de contact :</h1>
	<h3 class="pagetitre">Faites vous connaître !</h3>
	<form action="#" method="GET">
		<fieldset>
			<legend class="title">Informations sur le demandeur</legend>
			<p>
				<label for="nom">Nom<sup>*</sup> :</label>
				<input id="nom" name="nameUser" type="text" placeholder="Castex" required />
			</p>
			<p>
				<label for="prenom">Prénom :</label>
				<input id="prenom" name="prenomUser" type="text" placeholder="Jean" required />
			</p>
			<p>
				<label for="gender">Sexe :</label>
				<select id="gender" name="genderUser">
					<option value="Homme">Homme</option>
					<option value="Femme">Femme</option>
					<option value="Autre">Autre</option>
				</select>
			</p>
			<p>
				<label for="adresse_Email">Adresse Email<sup>*</sup> :</label>
				<input id="adresse_Email" name="email-user" type="email" placeholder="castexdu75@elysee.fr" required />
			</p>
			<p>
				<label for="codepostal">Code Postal<sup>*</sup> :</label>
				<input id="codepostal" type="number" placeholder="1000" min="01000" max="959999" name="codepostalUser" />
			</p>
			<p>
				<label for="pays">Pays<sup>*</sup>&nbsp;:</label>
				<select id="pays" name="paysUser">
					<option value="FR" selected>France</option>
					<option value="US">Etats-Unis</option>
					<option value="CN">Chine</option>
					<option value="VM">Vietnam</option>
					<option value="PL">Pologne</option>
					<option value="GB">Grande Bretgne</option>
					<option value="CH">Suisse</option>
					<option value="ES">Espagne</option>
					<option value="IT">Italie</option>
					<option value="DE">Allemagne</option>
					<option value="BE">Belgique</option>
					<option value="LX">Luxembourg</option>
					<option value="AU">Autre</option>
				</select>
			</p>
		</fieldset>
		<fieldset>
			<legend class="title">Quand est-ce que la force sera avec vous&nbsp;?</legend>
			<p>
				<label for="contactDate">Date à laquelle vous souhaiteriez être recontacté<sup>*</sup></label>
				<input id="contactDate" type="date" name="contactDateUser" />
			</p>
			<p>
				<label for="contactType">Vous avez entendu parler de nous via&nbsp;? </label>
				<select id="contactType" name="contactTypeUser">
					<option value="Internet" selected>En surfant sur le net ou par les réseaux sociaux (Facebook, Twitter,Instagram...)</option>
					<option value="Presse">Par la presse (journaux, radio, télé...)</option>
					<option value="Entourage"> Des gens de mon entourage m'ont fait découvrir le site</option>
					<option value="Dark Vador"> Dark Vador m'a obligé à acheter un sabre chez Solo
					<option value="Autre">Autre</option>
				</select>
			</p>
			<p>
				<label for="commentaire">Commentaires&nbsp;:</label>
				<TEXTAREA id="commentaire" name="commantaireUser" rows=4 cols=40 placeholder="Saisissez votre texte"></TEXTAREA>
			</p>
		</fieldset>
		<p class="boutons">
			<input type="submit" value="Envoyer" />
			<input type="reset" value="Réinitialiser" />
		</p>
		<p><sup>*</sup>Obligatoire</p>
	</form>
</main>
