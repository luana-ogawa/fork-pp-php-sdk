apt-get install jq
echo $(jq --version)

TAG_VERSION=$(cat composer.json | jq -r '.version')
echo $TAG_VERSION
