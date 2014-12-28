Feature: Punctuation Tokenization
  I need to be able to tokenize any given text

  Scenario: Tokenize by punctuation
    Given The following text:
      """ 
      Budi pergi ke pasar, membeli banyak hal: sapu, payung, keramik.
      """
    When I tokenize it
    Then I should get the following tokens:
      """ 
      Budi pergi ke pasar , membeli banyak hal : sapu , payung , keramik .
      """

  Scenario: Tokenize repetitive punctuation
    Given The following text:
      """ 
      Budi   belajar   NLP... Benarkah Budi   melakukan   tokenization???
      """
    When I tokenize it
    Then I should get the following tokens:
      """ 
      Budi belajar NLP ... Benarkah Budi melakukan tokenization ???
      """
  
  Scenario: Tokenize parentheses
    Given The following text:
      """ 
      (Natural Language Processing) NLP (Natural Language Processing).
      """
    When I tokenize it
    Then I should get the following tokens:
      """ 
      ( Natural Language Processing ) NLP ( Natural Language Processing ) .
      """

  Scenario: Tokenize quote
    Given The following text:
      """
      "(Saya) Aku akan belajar NLP," kata Budi.
      """
    When I tokenize it
    Then I should get the following tokens:
      """
      " ( Saya ) Aku akan belajar NLP , " kata Budi .
      """

  Scenario: Tokenize repeated word
    Given The following text:
      """
      Seakan dunia berputar-putar.
      """
    When I tokenize it
    Then I should get the following tokens:
      """
      Seakan dunia berputar-putar .
      """

  Scenario: Tokenize dash
    Given The following text:
      """
      Gadis itu--yang tadi tak peduli--kini menjadi peduli.
      """
    When I tokenize it
    Then I should get the following tokens:
      """
      Gadis itu -- yang tadi tak peduli -- kini menjadi peduli .
      """

