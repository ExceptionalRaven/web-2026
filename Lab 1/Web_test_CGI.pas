PROGRAM PrintEnv(INPUT, OUTPUT);
USES
  DOS;
VAR
  ReqMethod, QueryString, ContentLength, UserAgent, Host: STRING;
BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;

  ReqMethod := GetEnv('REQUEST_METHOD');
  QueryString := GetEnv('QUERY_STRING');
  ContentLength := GetEnv('CONTENT_LENGTH');
  UserAgent := GetEnv('HTTP_USER_AGENT');
  Host := GetEnv('HTTP_HOST');

  WRITELN('REQUEST_METHOD: ', ReqMethod);
  WRITELN('QUERY_STRING: ', QueryString);
  WRITELN('CONTENT_LENGTH: ', ContentLength);
  WRITELN('HTTP_USER_AGENT: ', UserAgent);
  WRITELN('HTTP_HOST: ', Host);
END.
