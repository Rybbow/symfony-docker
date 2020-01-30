
1. Utwórz encję artykułu (pola tytuł, treść, data utworzenia) + migracja.
2. Dodaj encję komentarza (autor: email, treść, data utworzenia) + migracja.
3. Utwórz fiksturki do artykułów i komentarzy.
4. Podepnij kontroler i widok listy artykułów pod model danych (zachowując stronnicowanie).
5. Podepnij kontroler i widok artykułu pod model danych, tak żeby ładowanie odbywało się po slugu (https://symfony.com/doc/master/bundles/StofDoctrineExtensionsBundle/installation.html). Użyj ParamConvertera do ładowania artykułu.
6. Utwórz kontroler tworzący artykuł z losowymi danymi w bazie danych.
7. Utwórz kontroler tworzący komentarz z losowymi danymi do wybranego artykułu w bazie danych.
8. Dodaj przycisk oraz kontroler do usuwania danego komentarza.
9. Utwórz kontroler tworzący aktualizujący wybrany artykuł losowymi danymi.
10. Dodaj filtrowanie listy artykułów po datach (od-do) podawanych jako zwykły query string.
11. Wypisz przy każdym artykule na liście ilość komentujących (tzn. unikalne adresy email w komentarzach).
12. Zoptymalizuj wyświetlanie ilości komentujących (patrz poprzedni punkt) poprzez dodanie pola do modelu artykułu aktualizowanego przez doctrine event listener.

do generowania:
`$ bin/console make:migration`
lub
`$ bin/console doctrine:migrations:diff`
do migrowania:
`$ bin/console doctrine:migrations:migrate`

`$ bin/console doctrine:fixtures:load`

uprawnienia docker/host:
`$ chown -R 1000:1000 ./`
