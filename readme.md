# Git Rebase Demo

The goal is to rebase several branches in order to reflect the final result below.

You may use the following command to see current branch graph:

```bash
git log --graph --decorate --oneline --color=always | less -R
```

## Initial state

The project consists of 3 branches:

- master
- develop (stems from master at commit [2])
- feature/unboxing (stems from develop at commit[4])

```diff
* [5] update MyString::append for metric byte units............(HEAD of master)
|
| | * [6] adding MyString::unbox.....................(HEAD of feature/unboxing)
| | |
| |/
| * [4] update MyString::append for metric mass units.........(HEAD of develop)
| * [3] adding MyString::prepend
| |
|/
* [2] adding MyString::append
* [1] initial import..............................................(ROOT commit)
|
```

## Expected final result

You are expected to produce a branch (any branch) with the following history:

```text
* [6] adding MyString::unbox
* [5] update MyString::append for metric byte units
* [4] update MyString::append for metric mass units
* [3] adding MyString::prepend
* [2] adding MyString::append
* [1] initial import
```

## Bonus, pass the tests

Use the following commands to run automated tests:

```bash
# install project dependencies
composer install

# run the tests
vendor/bin/phpunit
```
