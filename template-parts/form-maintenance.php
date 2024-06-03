<form class="st-form-maintenance">
  <fieldset class="st-form__radio-buttons">
    <legend>
      <?php _e('Avez-vous besoin d\'une maintenance régulière ou ponctuelle ?', 'studio-val'); ?>
    </legend>

    <div class="st-input__radio selected">
      <input type="radio" name="maintenance-type" id="regular" value="regular" />
      <label for="regular">
        <?php _e('Maintenance régulière', 'studio-val'); ?>
      </label>
    </div>

    <div class="st-input__radio">
      <input type="radio" name="maintenance-type" id="one-shot" value="one-shot" />
      <label for="one-shot">
        <?php _e('Maintenance ponctuelle', 'studio-val'); ?>
      </label>
    </div>
  </fieldset>

  <fieldset class="st-input__radio-cards">
    <legend>
      <?php _e('Quel type de maintenance vous faut-il ?', 'studio-val'); ?>
    </legend>

    <div class="st-input__radio--card selected">
      <input type="radio" name="maintenance-pack" id="preventive" value="preventive" />
      <label for="preventive">
        <span><?php _e('Maintenance <strong>préventive</strong>', 'studio-val'); ?></span>
        <p><?php _e('Sauvegardes de votre site*, mise à jour des extensions, restauration de votre site en cas de bug majeur, sécurisation constante, vérification du bon affichage des contenus', 'studio-val'); ?></p>
      </label>
    </div>

    <div class="st-input__radio--card">
      <input type="radio" name="maintenance-pack" id="premium" value="premium" />
      <label for="premium">
        <span><?php _e('Maintenance <strong>premium</strong>', 'studio-val'); ?></span>
        <p><?php _e('Contenu de la maintenance préventive + ajout et modifications de contenus**, (pages, textes, photos), optimisations des performances du ite, intégration de nouvelles fonctionnalités, licence WP Rocket incluse', 'studio-val'); ?></p>
      </label>
    </div>

    <small>* Stockage des sauvegardes sur les serveurs d’Infomaniak en Suisse, conforme au RGPD</small>
    <small>** Dans la limite de l’envoi par email de 4 listes comprenant chacune au maximum 5 demandes de modifications</small>
  </fieldset>
</form>