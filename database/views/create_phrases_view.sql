CREATE
OR REPLACE VIEW view_phrases
AS
SELECT p.id,
       p.word,
       p.page_id,
       pg.name as page,
       pt.id as phrase_translation_id,
       pt.language_code,
       pt.translation
FROM phrases p
         LEFT JOIN phrase_translations pt ON p.id = pt.object_id
         JOIN pages pg on pg.id = p.page_id

