USE cda_poitiers_2023_sql;

CREATE OR REPLACE VIEW vue_personnes_adresses AS
SELECT 
p.prenom, p.nom,
ad.rue, ad.code_postal, ad.ville,
LEFT(ad.code_postal, 2) as code_departement,
CONCAT_WS(' ', p.prenom, UCASE(p.nom)) as nom_complet 
FROM personnes as p
LEFT JOIN adresses as ad
ON ad.id = p.id_adresse;