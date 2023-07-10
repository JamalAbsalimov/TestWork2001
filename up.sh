#!/usr/bin/env bash

echo "Adding hosts"
HOSTS=('172.10.0.5 blog.local 172.10.0.5 api.blog.local')

if [[ -e "/c/Windows/System32/drivers/etc/hosts" ]]; then
  echo 'Your OS is Windows (Git bash)'
  HOSTS_PATH='/c/Windows/System32/drivers/etc/hosts'
elif [[ -e "/mnt/c/Windows/System32/drivers/etc/hosts" ]]; then
  HOSTS_PATH='/mnt/c/Windows/System32/drivers/etc/hosts'
  echo 'Your OS is Windows (WSL2)'
else
  HOSTS_PATH='/etc/hosts'
  echo 'Your OS is Linux'
fi

for t in "${HOSTS[@]}"; do
  if grep -q "${t}" ${HOSTS_PATH}; then
    echo "Запись $t уже добавлена"
  else
    echo "$t" >>${HOSTS_PATH}
    echo "Добавлена запись $t"
  fi
done

docker network create --subnet 172.10.0.0/16 blog_net

