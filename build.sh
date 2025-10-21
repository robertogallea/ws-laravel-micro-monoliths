#!/bin/sh
set -eu

if [ $# -eq 0 ]; then
  echo "⚙️  Nessun servizio specificato, ricostruisco tutto..."
  docker compose build --no-cache
else
  echo "⚙️  Ricostruisco i servizi: $*"
  docker compose build --no-cache "$@" --progress=plain
fi