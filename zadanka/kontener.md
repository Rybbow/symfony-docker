
1. Za pomocą event listenera przekieruj na stronę listy artykułów pod adresem "/".
2. Wstrzyknij zależność do AppExtension za pomocą setter injection.
3. Zrefaktoryzuj repozytoria, tak żeby istniał wydzielony interfejs do każdego repozytorium i zrób z nich aliasy w kontenerze do implementacji.
4. Przerób kontrolery na wstrzykiwanie repozytoriów za pomocą constructor injection.
5. Wstrzyknij zmienną APP_ENV do AppExtension za pomocą local binding.
6. Zrób serwis do tworzenia artykułu za pomocą DTO i zmień kontroler pod takie rozwiązanie.
