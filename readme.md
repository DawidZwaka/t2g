# Wprowadzenie

Projekt można uruchomić przy użyciu dockera za pomocą komendy `docker compose up -d` bezpośrednio w katalogu root tego projektu. Powinno to uruchomić uruchomić serwer http dostępny pod adresem http://localhost:8080/

# PHP

### Zadanie 1

Rozwiązanie dostępne w katalogu src/cryptography http://localhost:8080/cryptography/

### Zadanie 2

Rozwiązanie dostępne w katalogu src/lcdscreen http://localhost:8080/lcdscreen/

# SQL

### Zadanie 1
```
SELECT
	t.id ticket_id
FROM
    tickets t
JOIN draws d ON t.draw_id = d.id
JOIN lotteries l ON l.id = d.lottery_id
WHERE
	l.name = "GG World X" 
    AND d.draw_date > t.bought_date
    AND t.number = won_number
    AND d.won_number IS NOT NULL
GROUP BY t.id;
```

### Zadanie 2

```
SELECT
	l.name,
	SUM(l.ticket_price) revenue,
	SUM(CASE WHEN d.draw_date <= t.bought_date THEN 0 ELSE l.ticket_price END) profit
FROM lotteries l
JOIN draws d ON l.id = d.lottery_id
JOIN tickets t ON d.id = t.draw_id
WHERE
    MONTH(d.draw_date) = 7 AND YEAR(d.draw_date) = 2021
GROUP BY l.id;
```

# Frontend

Rozwiązanie dostępne w katalogu src/timer http://localhost:8080/timer/dist/

# Odpowiedzi na pytania

### Ogólne

1. Tak, przez pewien czas pracowałem w scrumie. Mój projekt był podzielony na sprinty, gdzie dla każdego sprintu obieraliśmy funkcjonalności możliwe do wdrożenia w ramach planningu, codzienne daily i retro na sprintu.
2. Tak, korzystałem z kanbana w ramach jiry, w celu łatwiejszego rozbicia projektu na pomniejsze fragmenty i łatwego śledzenia postępu w projekcie.
3. Oceniam na średniozaawansowany

### SCM

1. System kontroli wersji to oprogramowanie pozwalające zapisać każdą kolejną wersję projektu w ramach snapshotu. Przede wszystkim sprawdza się w przypadku pracy wielu programistów nad jednym projektem w tym samym czasie (funkcjonalności branch, wersjionowania, mr, rebase itd.).
2. Zazwyczaj przy korzystaniu z git'a używam CLI, ze względu na płynność jaką osiągnąłem przy używaniu komend, aczkolwiek od czasu do czasu zdarzy mi się użyć GUI git'a w VSC.
3. git cherry-pick [id-commitu]

### Bazy danych

1. Głównie relacyjne Mysql.
2. -
3. Zdarzyło mi się projektować bazy danych z diagramów w ramach studiów.
4. Indeks to element bazy danych, który pozwala przyśpieszyć zapytania SELECT kosztem zapytań aktualizujących lub wstawiających krotki do tabeli.
5. -
6. Transakcje pozwalają w bezpieczny sposób wykonać sekwencję zapytań. Idea transakcji opiera się na zasadzie ACID.

### PROGRAMOWANIE - OGÓLNE PYTANIA

1. Staram się zawsze mieć zainstalowane odpowiednie narzędzia do formatowania kodu, poprawia to czytelność kod, przez co łatwiej się po nim poruszać.
2. Zdarzyło mi się korzystać z PHPUnit. Co do TDD, wiem o nim tyle, że opiera się na pisaniu testów jednostkowych pod wymagania danej funkcjonalność, które później należy przejś przy pisaniu funkcjonalności. Nie zdarzyło mi się jeszcze korzystać z TDD w praktyce.
3. Przy kodowaniu staram się korzystać z SOLID, KISS, DRY, YAGNI.
4. KISS - keep it simple stupid. Jest to metodologia, która skupia się na pisaniu kodu w jak najprostszy i czytelny sposób. W praktyce można to odnieść do np. zbyt długich i zawiłych metod w klasie, które można, by wynieść do innych metod i odpowiednio uporzątkować.
5. SOLID to zbiór zasad Roberta C. Martina skłdający się z 5 zasad opisujący sposób w jaki powinno się pisać, kod, aby był on łatwo skalowalny i modyfikowalny, sam czytam właśnie książkę Roberta C. Martina na ten temat więc myślę, że w SOLID najważniejsze jest odpowiednie zrozumienie każdej z zasad i wdrożenie jest w życie tylko wtedy kiedy jest to wskazane.
6. Z racji na to, że komputery operują na sytemie binarnym, sposób konwertowania ułamka dziesiętnego na zwykły w niektórych przypadkach może powodować zaokrąglenia tych liczb. Operacje na tych liczbach mogą być ryzykowne. Jeśli zależy nam na pewnych kalkulacjach bez zbędnych zaokrągleń powinniśmy skorzystać z liczb całkowitych, a końcowe wyniki konwertać na zmiennoprzecinkowe.
7. 
    a) W OOP wyróżniamy 3 modyfikatory dostępu
    - <strong>private</strong> - kiedy mamy pewność, że dana metoda / właściwość powinna być dostępna tylko w klasie w której została zdefiniowana
    - <strong>protected</strong> - kiedy chcemy, aby dana metoda / właściwość była ukryta przed klasami niedziedziczącymi z tej konkretnej klasy, obiekty.
    - <strong>private</strong> - kiedy chcemy, aby dana metoda / właściwość była w pełni dostępna dla każdej klasy, obiektu

### PHP

1. Composer to menadżer pakietów dla PHP. update aktualizuje paczki dla danego projektu, a komenda install pozwala zainstalować nową paczkę.
2. Zdarzyło mi się kiedyś wersjonować sechmat bazy danych przy użyciu narzędzia symfony make:migration
3. Użyłbym do tego data fixtures
4. Korzystałem z Laravela pośrednio przez ok. rok jako podstawa sage 10, ale w ramach własnego rozwoju również interesowałem się Symfony i pisałem w nim sam dla siebie. Myślę, że o wiele lepiej czuję się w symfony.
5. Pozwalaja na łatwe wykorzystanie powtarzających się funkcjonalności. Są dobrą alternatywą dla wielokrotnego dziedziczenia po przez możliwość umieszczania róznych rodzajów traitów i korzystania z ich właściwości.

### SYSTEMY OPERACYJNE (*NIX)

1. Głównie korzystałem z ubuntu, aktualnie każdy mój projekt stawiam na dockerze, więc ten linuks się stale pojawia.
2. ps
3. pamieć fizyczna to pamięć ram danego komputera z czego pamięć wirtualna jest rozszerzona o dane tymczasowo przechowywane na dysku twardym
4. -
5. Poziom wykorzystania zasobów komputera, czy to RAM, CPU
6. W systemach unix prawa dostępu do plików są regulowane po przez system uprawnień, każdy z plkiów posiada uprawnienia dla każdego z trzech różnych grup: właściciela, grupy i innych. dla każdej z tych grup istnieją trzy uprawnienia:
- read - umożliwia odczyt pliku lub katalogu
- write - umożliwa modyfikację/zapis pliku lub katalogu
- execute - umożliwia uruchomienie programu

### FRONTEND

1. Doctype informuje przeglądarkę o wersji języka html w jakim dana strona została zapisana
2. Tak, wiele razy dokonywałem optymalizację skryptów, styli po przez usuwanie niepotrzebnych bibliotek, mnifikację, czy opóźnianie ładowania danych zdjęć, czy skryptów na stronie
3. Przez pewien czas korzystałem z SASS'a, myślę, że jego największą zaletą jest możliwość łatwego dzielenia styli, tworzenia własnych mixin'ów, czy też możliwość zagnieżdżania kodu.
4. Korzystałem przez pewien czas z bootstrapa'a, ale jakiś czas temu przeniosłem się na tailwindcss, który daje mi większą swobodę. Oczywiście ciężko porównywać te dwie biblioteki, bo jednak mają nieco inne zastosowanie, ale tailwind jest o wiele bardziej elastyczny.

### JAVASCRIPT

1. Korzystałem go w ramach towrzenia dynamicznego modułu filtrującego i sortującego elementy na stronie sklepu, również zgłębiałem o nim wiedzę we własnym zakresie.
2. Tak, jest to narzędzie do analizy kodu JS pod względem błędów składniowych.
3. Myślę, że dobrze znam ES6, moim zdaniem najważniejszą zmianą jest dodanie arrow function.
4. Tak , korzystam z npm na co dzień.