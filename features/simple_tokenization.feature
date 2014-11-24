Feature: Simple Tokenization
  I need to be able to tokenize any given text

  Scenario: Tokenize by whitespace
    Given The following text:
      """
      Ini kalimat pertama. Ini kalimat kedua.
      """
    When I tokenize it
    Then I should get the following tokens:
      """
      Ini kalimat pertama . Ini kalimat kedua .
      """

  Scenario: Tokenize multiple whitespace
    Given The following text:
      """
      Budi   belajar   NLP. Budi   melakukan   tokenization.
      """
    When I tokenize it
    Then I should get the following tokens:
      """
      Budi belajar NLP . Budi melakukan tokenization .
      """

  Scenario: Tokenize multiple whitespace
    Given The following text:
      """
      Budi membeli 2 buku tentang Natural Language Processing Bahasa Indonesia.
      """
    When I tokenize it
    Then I should get the following tokens:
      """
      Budi membeli 2 buku tentang Natural Language Processing Bahasa Indonesia .
      """
