# Prérequis

* Apache 2
* MySQL ou base de données
* PHP5 avec le PDO correspondant à la base de données


# Installation

Dans le dossier de ton choix :

    git clone git@github.com:Comptes/comptes.git    # récupération du dépot

    cd comptes
    php composer.phar update    # (en sudo si problème de permissions sur le cache)

    cp app/config/parameters.yml.dist app/config/parameters.yml     #copie du fichier de configuration
    pico app/config/parameters.yml   # édite le fichier de config avec tes infos

    php app/console doctrine:database:create    # création de la base de données

    