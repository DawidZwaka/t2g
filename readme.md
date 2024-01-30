# PHP

### Zadanie 1

Rozwiązanie dostępne w pliku src/cryptography.php

### Zadanie 2

Rozwiązanie dostępne w pliku src/lcdscreen.php

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

Zadanie dostępne w pliku src/timer.html