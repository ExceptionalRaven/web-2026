PROGRAM PrintHello(INPUT, OUTPUT);
BEGIN
  { 1. Выводим HTTP-заголовок, указывающий тип контента }
  WRITELN('Content-Type: text/plain');
  { 2. ВАЖНО: Пустая строка между заголовками и телом ответа }
  WRITELN;
  { 3. Тело ответа }
  WRITELN('Hello world!');
END.
