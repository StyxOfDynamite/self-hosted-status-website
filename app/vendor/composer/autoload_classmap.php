<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname(dirname($vendorDir));

return array(
    'Config\\Routes' => $baseDir . '/app/controllers/Routes.php',
    'Controller\\Api\\Components' => $baseDir . '/app/controllers/api/Components.php',
    'Controller\\Api\\Incidents' => $baseDir . '/app/controllers/api/Incidents.php',
    'Controller\\Api\\Pingdom\\Latency' => $baseDir . '/app/controllers/api/pingdom/Latency.php',
    'Controller\\Api\\Pingdom\\Performance' => $baseDir . '/app/controllers/api/pingdom/Performance.php',
    'Controller\\Api\\Pingdom\\Summary' => $baseDir . '/app/controllers/api/pingdom/Summary.php',
    'Controller\\Api\\Pingdom\\Uptime' => $baseDir . '/app/controllers/api/pingdom/Uptime.php',
    'Controller\\Api\\Single' => $baseDir . '/app/controllers/api/Single.php',
    'Controller\\Api\\Status' => $baseDir . '/app/controllers/api/Status.php',
    'Controller\\Api\\UptimeRobot\\Summary' => $baseDir . '/app/controllers/api/uptimerobot/Summary.php',
    'Controller\\Dashboard\\Components' => $baseDir . '/app/controllers/dashboard/Components.php',
    'Controller\\Dashboard\\Dashboard' => $baseDir . '/app/controllers/dashboard/Dashboard.php',
    'Controller\\Dashboard\\Import' => $baseDir . '/app/controllers/dashboard/Import.php',
    'Controller\\Dashboard\\Incidents' => $baseDir . '/app/controllers/dashboard/Incidents.php',
    'Controller\\Dashboard\\Settings' => $baseDir . '/app/controllers/dashboard/Settings.php',
    'Controller\\Dashboard\\Single' => $baseDir . '/app/controllers/dashboard/Single.php',
    'Controller\\History' => $baseDir . '/app/controllers/History.php',
    'Controller\\Rss' => $baseDir . '/app/controllers/Rss.php',
    'Controller\\Single' => $baseDir . '/app/controllers/Single.php',
    'Controller\\Status' => $baseDir . '/app/controllers/Status.php',
    'Flintstone\\Flintstone' => $vendorDir . '/fire015/flintstone/src/Flintstone/Flintstone.php',
    'Flintstone\\FlintstoneDB' => $vendorDir . '/fire015/flintstone/src/Flintstone/FlintstoneDB.php',
    'Flintstone\\FlintstoneException' => $vendorDir . '/fire015/flintstone/src/Flintstone/FlintstoneException.php',
    'Flintstone\\Formatter\\FormatterInterface' => $vendorDir . '/fire015/flintstone/src/Flintstone/Formatter/FormatterInterface.php',
    'Flintstone\\Formatter\\JsonFormatter' => $vendorDir . '/fire015/flintstone/src/Flintstone/Formatter/JsonFormatter.php',
    'Flintstone\\Formatter\\SerializeFormatter' => $vendorDir . '/fire015/flintstone/src/Flintstone/Formatter/SerializeFormatter.php',
    'League\\Plates\\Engine' => $vendorDir . '/league/plates/src/Engine.php',
    'League\\Plates\\Extension\\Asset' => $vendorDir . '/league/plates/src/Extension/Asset.php',
    'League\\Plates\\Extension\\ExtensionInterface' => $vendorDir . '/league/plates/src/Extension/ExtensionInterface.php',
    'League\\Plates\\Extension\\URI' => $vendorDir . '/league/plates/src/Extension/URI.php',
    'League\\Plates\\Template\\Data' => $vendorDir . '/league/plates/src/Template/Data.php',
    'League\\Plates\\Template\\Directory' => $vendorDir . '/league/plates/src/Template/Directory.php',
    'League\\Plates\\Template\\FileExtension' => $vendorDir . '/league/plates/src/Template/FileExtension.php',
    'League\\Plates\\Template\\Folder' => $vendorDir . '/league/plates/src/Template/Folder.php',
    'League\\Plates\\Template\\Folders' => $vendorDir . '/league/plates/src/Template/Folders.php',
    'League\\Plates\\Template\\Func' => $vendorDir . '/league/plates/src/Template/Func.php',
    'League\\Plates\\Template\\Functions' => $vendorDir . '/league/plates/src/Template/Functions.php',
    'League\\Plates\\Template\\Name' => $vendorDir . '/league/plates/src/Template/Name.php',
    'League\\Plates\\Template\\Template' => $vendorDir . '/league/plates/src/Template/Template.php',
    'Model\\Cache' => $baseDir . '/app/models/Cache.php',
    'Model\\Component' => $baseDir . '/app/models/Component.php',
    'Model\\Form' => $baseDir . '/app/models/Form.php',
    'Model\\Incident' => $baseDir . '/app/models/Incident.php',
    'Model\\Page' => $baseDir . '/app/models/Page.php',
    'Model\\Pingdom' => $baseDir . '/app/models/Pingdom.php',
    'Model\\Template' => $baseDir . '/app/models/Template.php',
    'Model\\UptimeRobot' => $baseDir . '/app/models/UptimeRobot.php',
    'Model\\Webhook' => $baseDir . '/app/models/Webhook.php',
    'Predis\\Autoloader' => $vendorDir . '/predis/predis/src/Autoloader.php',
    'Predis\\Client' => $vendorDir . '/predis/predis/src/Client.php',
    'Predis\\ClientContextInterface' => $vendorDir . '/predis/predis/src/ClientContextInterface.php',
    'Predis\\ClientException' => $vendorDir . '/predis/predis/src/ClientException.php',
    'Predis\\ClientInterface' => $vendorDir . '/predis/predis/src/ClientInterface.php',
    'Predis\\Cluster\\ClusterStrategy' => $vendorDir . '/predis/predis/src/Cluster/ClusterStrategy.php',
    'Predis\\Cluster\\Distributor\\DistributorInterface' => $vendorDir . '/predis/predis/src/Cluster/Distributor/DistributorInterface.php',
    'Predis\\Cluster\\Distributor\\EmptyRingException' => $vendorDir . '/predis/predis/src/Cluster/Distributor/EmptyRingException.php',
    'Predis\\Cluster\\Distributor\\HashRing' => $vendorDir . '/predis/predis/src/Cluster/Distributor/HashRing.php',
    'Predis\\Cluster\\Distributor\\KetamaRing' => $vendorDir . '/predis/predis/src/Cluster/Distributor/KetamaRing.php',
    'Predis\\Cluster\\Hash\\CRC16' => $vendorDir . '/predis/predis/src/Cluster/Hash/CRC16.php',
    'Predis\\Cluster\\Hash\\HashGeneratorInterface' => $vendorDir . '/predis/predis/src/Cluster/Hash/HashGeneratorInterface.php',
    'Predis\\Cluster\\PredisStrategy' => $vendorDir . '/predis/predis/src/Cluster/PredisStrategy.php',
    'Predis\\Cluster\\RedisStrategy' => $vendorDir . '/predis/predis/src/Cluster/RedisStrategy.php',
    'Predis\\Cluster\\StrategyInterface' => $vendorDir . '/predis/predis/src/Cluster/StrategyInterface.php',
    'Predis\\Collection\\Iterator\\CursorBasedIterator' => $vendorDir . '/predis/predis/src/Collection/Iterator/CursorBasedIterator.php',
    'Predis\\Collection\\Iterator\\HashKey' => $vendorDir . '/predis/predis/src/Collection/Iterator/HashKey.php',
    'Predis\\Collection\\Iterator\\Keyspace' => $vendorDir . '/predis/predis/src/Collection/Iterator/Keyspace.php',
    'Predis\\Collection\\Iterator\\ListKey' => $vendorDir . '/predis/predis/src/Collection/Iterator/ListKey.php',
    'Predis\\Collection\\Iterator\\SetKey' => $vendorDir . '/predis/predis/src/Collection/Iterator/SetKey.php',
    'Predis\\Collection\\Iterator\\SortedSetKey' => $vendorDir . '/predis/predis/src/Collection/Iterator/SortedSetKey.php',
    'Predis\\Command\\Command' => $vendorDir . '/predis/predis/src/Command/Command.php',
    'Predis\\Command\\CommandInterface' => $vendorDir . '/predis/predis/src/Command/CommandInterface.php',
    'Predis\\Command\\ConnectionAuth' => $vendorDir . '/predis/predis/src/Command/ConnectionAuth.php',
    'Predis\\Command\\ConnectionEcho' => $vendorDir . '/predis/predis/src/Command/ConnectionEcho.php',
    'Predis\\Command\\ConnectionPing' => $vendorDir . '/predis/predis/src/Command/ConnectionPing.php',
    'Predis\\Command\\ConnectionQuit' => $vendorDir . '/predis/predis/src/Command/ConnectionQuit.php',
    'Predis\\Command\\ConnectionSelect' => $vendorDir . '/predis/predis/src/Command/ConnectionSelect.php',
    'Predis\\Command\\HashDelete' => $vendorDir . '/predis/predis/src/Command/HashDelete.php',
    'Predis\\Command\\HashExists' => $vendorDir . '/predis/predis/src/Command/HashExists.php',
    'Predis\\Command\\HashGet' => $vendorDir . '/predis/predis/src/Command/HashGet.php',
    'Predis\\Command\\HashGetAll' => $vendorDir . '/predis/predis/src/Command/HashGetAll.php',
    'Predis\\Command\\HashGetMultiple' => $vendorDir . '/predis/predis/src/Command/HashGetMultiple.php',
    'Predis\\Command\\HashIncrementBy' => $vendorDir . '/predis/predis/src/Command/HashIncrementBy.php',
    'Predis\\Command\\HashIncrementByFloat' => $vendorDir . '/predis/predis/src/Command/HashIncrementByFloat.php',
    'Predis\\Command\\HashKeys' => $vendorDir . '/predis/predis/src/Command/HashKeys.php',
    'Predis\\Command\\HashLength' => $vendorDir . '/predis/predis/src/Command/HashLength.php',
    'Predis\\Command\\HashScan' => $vendorDir . '/predis/predis/src/Command/HashScan.php',
    'Predis\\Command\\HashSet' => $vendorDir . '/predis/predis/src/Command/HashSet.php',
    'Predis\\Command\\HashSetMultiple' => $vendorDir . '/predis/predis/src/Command/HashSetMultiple.php',
    'Predis\\Command\\HashSetPreserve' => $vendorDir . '/predis/predis/src/Command/HashSetPreserve.php',
    'Predis\\Command\\HashValues' => $vendorDir . '/predis/predis/src/Command/HashValues.php',
    'Predis\\Command\\HyperLogLogAdd' => $vendorDir . '/predis/predis/src/Command/HyperLogLogAdd.php',
    'Predis\\Command\\HyperLogLogCount' => $vendorDir . '/predis/predis/src/Command/HyperLogLogCount.php',
    'Predis\\Command\\HyperLogLogMerge' => $vendorDir . '/predis/predis/src/Command/HyperLogLogMerge.php',
    'Predis\\Command\\KeyDelete' => $vendorDir . '/predis/predis/src/Command/KeyDelete.php',
    'Predis\\Command\\KeyDump' => $vendorDir . '/predis/predis/src/Command/KeyDump.php',
    'Predis\\Command\\KeyExists' => $vendorDir . '/predis/predis/src/Command/KeyExists.php',
    'Predis\\Command\\KeyExpire' => $vendorDir . '/predis/predis/src/Command/KeyExpire.php',
    'Predis\\Command\\KeyExpireAt' => $vendorDir . '/predis/predis/src/Command/KeyExpireAt.php',
    'Predis\\Command\\KeyKeys' => $vendorDir . '/predis/predis/src/Command/KeyKeys.php',
    'Predis\\Command\\KeyMove' => $vendorDir . '/predis/predis/src/Command/KeyMove.php',
    'Predis\\Command\\KeyPersist' => $vendorDir . '/predis/predis/src/Command/KeyPersist.php',
    'Predis\\Command\\KeyPreciseExpire' => $vendorDir . '/predis/predis/src/Command/KeyPreciseExpire.php',
    'Predis\\Command\\KeyPreciseExpireAt' => $vendorDir . '/predis/predis/src/Command/KeyPreciseExpireAt.php',
    'Predis\\Command\\KeyPreciseTimeToLive' => $vendorDir . '/predis/predis/src/Command/KeyPreciseTimeToLive.php',
    'Predis\\Command\\KeyRandom' => $vendorDir . '/predis/predis/src/Command/KeyRandom.php',
    'Predis\\Command\\KeyRename' => $vendorDir . '/predis/predis/src/Command/KeyRename.php',
    'Predis\\Command\\KeyRenamePreserve' => $vendorDir . '/predis/predis/src/Command/KeyRenamePreserve.php',
    'Predis\\Command\\KeyRestore' => $vendorDir . '/predis/predis/src/Command/KeyRestore.php',
    'Predis\\Command\\KeyScan' => $vendorDir . '/predis/predis/src/Command/KeyScan.php',
    'Predis\\Command\\KeySort' => $vendorDir . '/predis/predis/src/Command/KeySort.php',
    'Predis\\Command\\KeyTimeToLive' => $vendorDir . '/predis/predis/src/Command/KeyTimeToLive.php',
    'Predis\\Command\\KeyType' => $vendorDir . '/predis/predis/src/Command/KeyType.php',
    'Predis\\Command\\ListIndex' => $vendorDir . '/predis/predis/src/Command/ListIndex.php',
    'Predis\\Command\\ListInsert' => $vendorDir . '/predis/predis/src/Command/ListInsert.php',
    'Predis\\Command\\ListLength' => $vendorDir . '/predis/predis/src/Command/ListLength.php',
    'Predis\\Command\\ListPopFirst' => $vendorDir . '/predis/predis/src/Command/ListPopFirst.php',
    'Predis\\Command\\ListPopFirstBlocking' => $vendorDir . '/predis/predis/src/Command/ListPopFirstBlocking.php',
    'Predis\\Command\\ListPopLast' => $vendorDir . '/predis/predis/src/Command/ListPopLast.php',
    'Predis\\Command\\ListPopLastBlocking' => $vendorDir . '/predis/predis/src/Command/ListPopLastBlocking.php',
    'Predis\\Command\\ListPopLastPushHead' => $vendorDir . '/predis/predis/src/Command/ListPopLastPushHead.php',
    'Predis\\Command\\ListPopLastPushHeadBlocking' => $vendorDir . '/predis/predis/src/Command/ListPopLastPushHeadBlocking.php',
    'Predis\\Command\\ListPushHead' => $vendorDir . '/predis/predis/src/Command/ListPushHead.php',
    'Predis\\Command\\ListPushHeadX' => $vendorDir . '/predis/predis/src/Command/ListPushHeadX.php',
    'Predis\\Command\\ListPushTail' => $vendorDir . '/predis/predis/src/Command/ListPushTail.php',
    'Predis\\Command\\ListPushTailX' => $vendorDir . '/predis/predis/src/Command/ListPushTailX.php',
    'Predis\\Command\\ListRange' => $vendorDir . '/predis/predis/src/Command/ListRange.php',
    'Predis\\Command\\ListRemove' => $vendorDir . '/predis/predis/src/Command/ListRemove.php',
    'Predis\\Command\\ListSet' => $vendorDir . '/predis/predis/src/Command/ListSet.php',
    'Predis\\Command\\ListTrim' => $vendorDir . '/predis/predis/src/Command/ListTrim.php',
    'Predis\\Command\\PrefixableCommandInterface' => $vendorDir . '/predis/predis/src/Command/PrefixableCommandInterface.php',
    'Predis\\Command\\Processor\\KeyPrefixProcessor' => $vendorDir . '/predis/predis/src/Command/Processor/KeyPrefixProcessor.php',
    'Predis\\Command\\Processor\\ProcessorChain' => $vendorDir . '/predis/predis/src/Command/Processor/ProcessorChain.php',
    'Predis\\Command\\Processor\\ProcessorInterface' => $vendorDir . '/predis/predis/src/Command/Processor/ProcessorInterface.php',
    'Predis\\Command\\PubSubPublish' => $vendorDir . '/predis/predis/src/Command/PubSubPublish.php',
    'Predis\\Command\\PubSubPubsub' => $vendorDir . '/predis/predis/src/Command/PubSubPubsub.php',
    'Predis\\Command\\PubSubSubscribe' => $vendorDir . '/predis/predis/src/Command/PubSubSubscribe.php',
    'Predis\\Command\\PubSubSubscribeByPattern' => $vendorDir . '/predis/predis/src/Command/PubSubSubscribeByPattern.php',
    'Predis\\Command\\PubSubUnsubscribe' => $vendorDir . '/predis/predis/src/Command/PubSubUnsubscribe.php',
    'Predis\\Command\\PubSubUnsubscribeByPattern' => $vendorDir . '/predis/predis/src/Command/PubSubUnsubscribeByPattern.php',
    'Predis\\Command\\RawCommand' => $vendorDir . '/predis/predis/src/Command/RawCommand.php',
    'Predis\\Command\\ScriptCommand' => $vendorDir . '/predis/predis/src/Command/ScriptCommand.php',
    'Predis\\Command\\ServerBackgroundRewriteAOF' => $vendorDir . '/predis/predis/src/Command/ServerBackgroundRewriteAOF.php',
    'Predis\\Command\\ServerBackgroundSave' => $vendorDir . '/predis/predis/src/Command/ServerBackgroundSave.php',
    'Predis\\Command\\ServerClient' => $vendorDir . '/predis/predis/src/Command/ServerClient.php',
    'Predis\\Command\\ServerCommand' => $vendorDir . '/predis/predis/src/Command/ServerCommand.php',
    'Predis\\Command\\ServerConfig' => $vendorDir . '/predis/predis/src/Command/ServerConfig.php',
    'Predis\\Command\\ServerDatabaseSize' => $vendorDir . '/predis/predis/src/Command/ServerDatabaseSize.php',
    'Predis\\Command\\ServerEval' => $vendorDir . '/predis/predis/src/Command/ServerEval.php',
    'Predis\\Command\\ServerEvalSHA' => $vendorDir . '/predis/predis/src/Command/ServerEvalSHA.php',
    'Predis\\Command\\ServerFlushAll' => $vendorDir . '/predis/predis/src/Command/ServerFlushAll.php',
    'Predis\\Command\\ServerFlushDatabase' => $vendorDir . '/predis/predis/src/Command/ServerFlushDatabase.php',
    'Predis\\Command\\ServerInfo' => $vendorDir . '/predis/predis/src/Command/ServerInfo.php',
    'Predis\\Command\\ServerInfoV26x' => $vendorDir . '/predis/predis/src/Command/ServerInfoV26x.php',
    'Predis\\Command\\ServerLastSave' => $vendorDir . '/predis/predis/src/Command/ServerLastSave.php',
    'Predis\\Command\\ServerMonitor' => $vendorDir . '/predis/predis/src/Command/ServerMonitor.php',
    'Predis\\Command\\ServerObject' => $vendorDir . '/predis/predis/src/Command/ServerObject.php',
    'Predis\\Command\\ServerSave' => $vendorDir . '/predis/predis/src/Command/ServerSave.php',
    'Predis\\Command\\ServerScript' => $vendorDir . '/predis/predis/src/Command/ServerScript.php',
    'Predis\\Command\\ServerSentinel' => $vendorDir . '/predis/predis/src/Command/ServerSentinel.php',
    'Predis\\Command\\ServerShutdown' => $vendorDir . '/predis/predis/src/Command/ServerShutdown.php',
    'Predis\\Command\\ServerSlaveOf' => $vendorDir . '/predis/predis/src/Command/ServerSlaveOf.php',
    'Predis\\Command\\ServerSlowlog' => $vendorDir . '/predis/predis/src/Command/ServerSlowlog.php',
    'Predis\\Command\\ServerTime' => $vendorDir . '/predis/predis/src/Command/ServerTime.php',
    'Predis\\Command\\SetAdd' => $vendorDir . '/predis/predis/src/Command/SetAdd.php',
    'Predis\\Command\\SetCardinality' => $vendorDir . '/predis/predis/src/Command/SetCardinality.php',
    'Predis\\Command\\SetDifference' => $vendorDir . '/predis/predis/src/Command/SetDifference.php',
    'Predis\\Command\\SetDifferenceStore' => $vendorDir . '/predis/predis/src/Command/SetDifferenceStore.php',
    'Predis\\Command\\SetIntersection' => $vendorDir . '/predis/predis/src/Command/SetIntersection.php',
    'Predis\\Command\\SetIntersectionStore' => $vendorDir . '/predis/predis/src/Command/SetIntersectionStore.php',
    'Predis\\Command\\SetIsMember' => $vendorDir . '/predis/predis/src/Command/SetIsMember.php',
    'Predis\\Command\\SetMembers' => $vendorDir . '/predis/predis/src/Command/SetMembers.php',
    'Predis\\Command\\SetMove' => $vendorDir . '/predis/predis/src/Command/SetMove.php',
    'Predis\\Command\\SetPop' => $vendorDir . '/predis/predis/src/Command/SetPop.php',
    'Predis\\Command\\SetRandomMember' => $vendorDir . '/predis/predis/src/Command/SetRandomMember.php',
    'Predis\\Command\\SetRemove' => $vendorDir . '/predis/predis/src/Command/SetRemove.php',
    'Predis\\Command\\SetScan' => $vendorDir . '/predis/predis/src/Command/SetScan.php',
    'Predis\\Command\\SetUnion' => $vendorDir . '/predis/predis/src/Command/SetUnion.php',
    'Predis\\Command\\SetUnionStore' => $vendorDir . '/predis/predis/src/Command/SetUnionStore.php',
    'Predis\\Command\\StringAppend' => $vendorDir . '/predis/predis/src/Command/StringAppend.php',
    'Predis\\Command\\StringBitCount' => $vendorDir . '/predis/predis/src/Command/StringBitCount.php',
    'Predis\\Command\\StringBitOp' => $vendorDir . '/predis/predis/src/Command/StringBitOp.php',
    'Predis\\Command\\StringBitPos' => $vendorDir . '/predis/predis/src/Command/StringBitPos.php',
    'Predis\\Command\\StringDecrement' => $vendorDir . '/predis/predis/src/Command/StringDecrement.php',
    'Predis\\Command\\StringDecrementBy' => $vendorDir . '/predis/predis/src/Command/StringDecrementBy.php',
    'Predis\\Command\\StringGet' => $vendorDir . '/predis/predis/src/Command/StringGet.php',
    'Predis\\Command\\StringGetBit' => $vendorDir . '/predis/predis/src/Command/StringGetBit.php',
    'Predis\\Command\\StringGetMultiple' => $vendorDir . '/predis/predis/src/Command/StringGetMultiple.php',
    'Predis\\Command\\StringGetRange' => $vendorDir . '/predis/predis/src/Command/StringGetRange.php',
    'Predis\\Command\\StringGetSet' => $vendorDir . '/predis/predis/src/Command/StringGetSet.php',
    'Predis\\Command\\StringIncrement' => $vendorDir . '/predis/predis/src/Command/StringIncrement.php',
    'Predis\\Command\\StringIncrementBy' => $vendorDir . '/predis/predis/src/Command/StringIncrementBy.php',
    'Predis\\Command\\StringIncrementByFloat' => $vendorDir . '/predis/predis/src/Command/StringIncrementByFloat.php',
    'Predis\\Command\\StringPreciseSetExpire' => $vendorDir . '/predis/predis/src/Command/StringPreciseSetExpire.php',
    'Predis\\Command\\StringSet' => $vendorDir . '/predis/predis/src/Command/StringSet.php',
    'Predis\\Command\\StringSetBit' => $vendorDir . '/predis/predis/src/Command/StringSetBit.php',
    'Predis\\Command\\StringSetExpire' => $vendorDir . '/predis/predis/src/Command/StringSetExpire.php',
    'Predis\\Command\\StringSetMultiple' => $vendorDir . '/predis/predis/src/Command/StringSetMultiple.php',
    'Predis\\Command\\StringSetMultiplePreserve' => $vendorDir . '/predis/predis/src/Command/StringSetMultiplePreserve.php',
    'Predis\\Command\\StringSetPreserve' => $vendorDir . '/predis/predis/src/Command/StringSetPreserve.php',
    'Predis\\Command\\StringSetRange' => $vendorDir . '/predis/predis/src/Command/StringSetRange.php',
    'Predis\\Command\\StringStrlen' => $vendorDir . '/predis/predis/src/Command/StringStrlen.php',
    'Predis\\Command\\StringSubstr' => $vendorDir . '/predis/predis/src/Command/StringSubstr.php',
    'Predis\\Command\\TransactionDiscard' => $vendorDir . '/predis/predis/src/Command/TransactionDiscard.php',
    'Predis\\Command\\TransactionExec' => $vendorDir . '/predis/predis/src/Command/TransactionExec.php',
    'Predis\\Command\\TransactionMulti' => $vendorDir . '/predis/predis/src/Command/TransactionMulti.php',
    'Predis\\Command\\TransactionUnwatch' => $vendorDir . '/predis/predis/src/Command/TransactionUnwatch.php',
    'Predis\\Command\\TransactionWatch' => $vendorDir . '/predis/predis/src/Command/TransactionWatch.php',
    'Predis\\Command\\ZSetAdd' => $vendorDir . '/predis/predis/src/Command/ZSetAdd.php',
    'Predis\\Command\\ZSetCardinality' => $vendorDir . '/predis/predis/src/Command/ZSetCardinality.php',
    'Predis\\Command\\ZSetCount' => $vendorDir . '/predis/predis/src/Command/ZSetCount.php',
    'Predis\\Command\\ZSetIncrementBy' => $vendorDir . '/predis/predis/src/Command/ZSetIncrementBy.php',
    'Predis\\Command\\ZSetIntersectionStore' => $vendorDir . '/predis/predis/src/Command/ZSetIntersectionStore.php',
    'Predis\\Command\\ZSetLexCount' => $vendorDir . '/predis/predis/src/Command/ZSetLexCount.php',
    'Predis\\Command\\ZSetRange' => $vendorDir . '/predis/predis/src/Command/ZSetRange.php',
    'Predis\\Command\\ZSetRangeByLex' => $vendorDir . '/predis/predis/src/Command/ZSetRangeByLex.php',
    'Predis\\Command\\ZSetRangeByScore' => $vendorDir . '/predis/predis/src/Command/ZSetRangeByScore.php',
    'Predis\\Command\\ZSetRank' => $vendorDir . '/predis/predis/src/Command/ZSetRank.php',
    'Predis\\Command\\ZSetRemove' => $vendorDir . '/predis/predis/src/Command/ZSetRemove.php',
    'Predis\\Command\\ZSetRemoveRangeByLex' => $vendorDir . '/predis/predis/src/Command/ZSetRemoveRangeByLex.php',
    'Predis\\Command\\ZSetRemoveRangeByRank' => $vendorDir . '/predis/predis/src/Command/ZSetRemoveRangeByRank.php',
    'Predis\\Command\\ZSetRemoveRangeByScore' => $vendorDir . '/predis/predis/src/Command/ZSetRemoveRangeByScore.php',
    'Predis\\Command\\ZSetReverseRange' => $vendorDir . '/predis/predis/src/Command/ZSetReverseRange.php',
    'Predis\\Command\\ZSetReverseRangeByScore' => $vendorDir . '/predis/predis/src/Command/ZSetReverseRangeByScore.php',
    'Predis\\Command\\ZSetReverseRank' => $vendorDir . '/predis/predis/src/Command/ZSetReverseRank.php',
    'Predis\\Command\\ZSetScan' => $vendorDir . '/predis/predis/src/Command/ZSetScan.php',
    'Predis\\Command\\ZSetScore' => $vendorDir . '/predis/predis/src/Command/ZSetScore.php',
    'Predis\\Command\\ZSetUnionStore' => $vendorDir . '/predis/predis/src/Command/ZSetUnionStore.php',
    'Predis\\CommunicationException' => $vendorDir . '/predis/predis/src/CommunicationException.php',
    'Predis\\Configuration\\ClusterOption' => $vendorDir . '/predis/predis/src/Configuration/ClusterOption.php',
    'Predis\\Configuration\\ConnectionFactoryOption' => $vendorDir . '/predis/predis/src/Configuration/ConnectionFactoryOption.php',
    'Predis\\Configuration\\ExceptionsOption' => $vendorDir . '/predis/predis/src/Configuration/ExceptionsOption.php',
    'Predis\\Configuration\\OptionInterface' => $vendorDir . '/predis/predis/src/Configuration/OptionInterface.php',
    'Predis\\Configuration\\Options' => $vendorDir . '/predis/predis/src/Configuration/Options.php',
    'Predis\\Configuration\\OptionsInterface' => $vendorDir . '/predis/predis/src/Configuration/OptionsInterface.php',
    'Predis\\Configuration\\PrefixOption' => $vendorDir . '/predis/predis/src/Configuration/PrefixOption.php',
    'Predis\\Configuration\\ProfileOption' => $vendorDir . '/predis/predis/src/Configuration/ProfileOption.php',
    'Predis\\Configuration\\ReplicationOption' => $vendorDir . '/predis/predis/src/Configuration/ReplicationOption.php',
    'Predis\\Connection\\AbstractConnection' => $vendorDir . '/predis/predis/src/Connection/AbstractConnection.php',
    'Predis\\Connection\\AggregateConnectionInterface' => $vendorDir . '/predis/predis/src/Connection/AggregateConnectionInterface.php',
    'Predis\\Connection\\Aggregate\\ClusterInterface' => $vendorDir . '/predis/predis/src/Connection/Aggregate/ClusterInterface.php',
    'Predis\\Connection\\Aggregate\\MasterSlaveReplication' => $vendorDir . '/predis/predis/src/Connection/Aggregate/MasterSlaveReplication.php',
    'Predis\\Connection\\Aggregate\\PredisCluster' => $vendorDir . '/predis/predis/src/Connection/Aggregate/PredisCluster.php',
    'Predis\\Connection\\Aggregate\\RedisCluster' => $vendorDir . '/predis/predis/src/Connection/Aggregate/RedisCluster.php',
    'Predis\\Connection\\Aggregate\\ReplicationInterface' => $vendorDir . '/predis/predis/src/Connection/Aggregate/ReplicationInterface.php',
    'Predis\\Connection\\CompositeConnectionInterface' => $vendorDir . '/predis/predis/src/Connection/CompositeConnectionInterface.php',
    'Predis\\Connection\\CompositeStreamConnection' => $vendorDir . '/predis/predis/src/Connection/CompositeStreamConnection.php',
    'Predis\\Connection\\ConnectionException' => $vendorDir . '/predis/predis/src/Connection/ConnectionException.php',
    'Predis\\Connection\\ConnectionInterface' => $vendorDir . '/predis/predis/src/Connection/ConnectionInterface.php',
    'Predis\\Connection\\Factory' => $vendorDir . '/predis/predis/src/Connection/Factory.php',
    'Predis\\Connection\\FactoryInterface' => $vendorDir . '/predis/predis/src/Connection/FactoryInterface.php',
    'Predis\\Connection\\NodeConnectionInterface' => $vendorDir . '/predis/predis/src/Connection/NodeConnectionInterface.php',
    'Predis\\Connection\\Parameters' => $vendorDir . '/predis/predis/src/Connection/Parameters.php',
    'Predis\\Connection\\ParametersInterface' => $vendorDir . '/predis/predis/src/Connection/ParametersInterface.php',
    'Predis\\Connection\\PhpiredisSocketConnection' => $vendorDir . '/predis/predis/src/Connection/PhpiredisSocketConnection.php',
    'Predis\\Connection\\PhpiredisStreamConnection' => $vendorDir . '/predis/predis/src/Connection/PhpiredisStreamConnection.php',
    'Predis\\Connection\\StreamConnection' => $vendorDir . '/predis/predis/src/Connection/StreamConnection.php',
    'Predis\\Connection\\WebdisConnection' => $vendorDir . '/predis/predis/src/Connection/WebdisConnection.php',
    'Predis\\Monitor\\Consumer' => $vendorDir . '/predis/predis/src/Monitor/Consumer.php',
    'Predis\\NotSupportedException' => $vendorDir . '/predis/predis/src/NotSupportedException.php',
    'Predis\\Pipeline\\Atomic' => $vendorDir . '/predis/predis/src/Pipeline/Atomic.php',
    'Predis\\Pipeline\\ConnectionErrorProof' => $vendorDir . '/predis/predis/src/Pipeline/ConnectionErrorProof.php',
    'Predis\\Pipeline\\FireAndForget' => $vendorDir . '/predis/predis/src/Pipeline/FireAndForget.php',
    'Predis\\Pipeline\\Pipeline' => $vendorDir . '/predis/predis/src/Pipeline/Pipeline.php',
    'Predis\\PredisException' => $vendorDir . '/predis/predis/src/PredisException.php',
    'Predis\\Profile\\Factory' => $vendorDir . '/predis/predis/src/Profile/Factory.php',
    'Predis\\Profile\\ProfileInterface' => $vendorDir . '/predis/predis/src/Profile/ProfileInterface.php',
    'Predis\\Profile\\RedisProfile' => $vendorDir . '/predis/predis/src/Profile/RedisProfile.php',
    'Predis\\Profile\\RedisUnstable' => $vendorDir . '/predis/predis/src/Profile/RedisUnstable.php',
    'Predis\\Profile\\RedisVersion200' => $vendorDir . '/predis/predis/src/Profile/RedisVersion200.php',
    'Predis\\Profile\\RedisVersion220' => $vendorDir . '/predis/predis/src/Profile/RedisVersion220.php',
    'Predis\\Profile\\RedisVersion240' => $vendorDir . '/predis/predis/src/Profile/RedisVersion240.php',
    'Predis\\Profile\\RedisVersion260' => $vendorDir . '/predis/predis/src/Profile/RedisVersion260.php',
    'Predis\\Profile\\RedisVersion280' => $vendorDir . '/predis/predis/src/Profile/RedisVersion280.php',
    'Predis\\Profile\\RedisVersion300' => $vendorDir . '/predis/predis/src/Profile/RedisVersion300.php',
    'Predis\\Protocol\\ProtocolException' => $vendorDir . '/predis/predis/src/Protocol/ProtocolException.php',
    'Predis\\Protocol\\ProtocolProcessorInterface' => $vendorDir . '/predis/predis/src/Protocol/ProtocolProcessorInterface.php',
    'Predis\\Protocol\\RequestSerializerInterface' => $vendorDir . '/predis/predis/src/Protocol/RequestSerializerInterface.php',
    'Predis\\Protocol\\ResponseReaderInterface' => $vendorDir . '/predis/predis/src/Protocol/ResponseReaderInterface.php',
    'Predis\\Protocol\\Text\\CompositeProtocolProcessor' => $vendorDir . '/predis/predis/src/Protocol/Text/CompositeProtocolProcessor.php',
    'Predis\\Protocol\\Text\\Handler\\BulkResponse' => $vendorDir . '/predis/predis/src/Protocol/Text/Handler/BulkResponse.php',
    'Predis\\Protocol\\Text\\Handler\\ErrorResponse' => $vendorDir . '/predis/predis/src/Protocol/Text/Handler/ErrorResponse.php',
    'Predis\\Protocol\\Text\\Handler\\IntegerResponse' => $vendorDir . '/predis/predis/src/Protocol/Text/Handler/IntegerResponse.php',
    'Predis\\Protocol\\Text\\Handler\\MultiBulkResponse' => $vendorDir . '/predis/predis/src/Protocol/Text/Handler/MultiBulkResponse.php',
    'Predis\\Protocol\\Text\\Handler\\ResponseHandlerInterface' => $vendorDir . '/predis/predis/src/Protocol/Text/Handler/ResponseHandlerInterface.php',
    'Predis\\Protocol\\Text\\Handler\\StatusResponse' => $vendorDir . '/predis/predis/src/Protocol/Text/Handler/StatusResponse.php',
    'Predis\\Protocol\\Text\\Handler\\StreamableMultiBulkResponse' => $vendorDir . '/predis/predis/src/Protocol/Text/Handler/StreamableMultiBulkResponse.php',
    'Predis\\Protocol\\Text\\ProtocolProcessor' => $vendorDir . '/predis/predis/src/Protocol/Text/ProtocolProcessor.php',
    'Predis\\Protocol\\Text\\RequestSerializer' => $vendorDir . '/predis/predis/src/Protocol/Text/RequestSerializer.php',
    'Predis\\Protocol\\Text\\ResponseReader' => $vendorDir . '/predis/predis/src/Protocol/Text/ResponseReader.php',
    'Predis\\PubSub\\AbstractConsumer' => $vendorDir . '/predis/predis/src/PubSub/AbstractConsumer.php',
    'Predis\\PubSub\\Consumer' => $vendorDir . '/predis/predis/src/PubSub/Consumer.php',
    'Predis\\PubSub\\DispatcherLoop' => $vendorDir . '/predis/predis/src/PubSub/DispatcherLoop.php',
    'Predis\\Replication\\ReplicationStrategy' => $vendorDir . '/predis/predis/src/Replication/ReplicationStrategy.php',
    'Predis\\Response\\Error' => $vendorDir . '/predis/predis/src/Response/Error.php',
    'Predis\\Response\\ErrorInterface' => $vendorDir . '/predis/predis/src/Response/ErrorInterface.php',
    'Predis\\Response\\Iterator\\MultiBulk' => $vendorDir . '/predis/predis/src/Response/Iterator/MultiBulk.php',
    'Predis\\Response\\Iterator\\MultiBulkIterator' => $vendorDir . '/predis/predis/src/Response/Iterator/MultiBulkIterator.php',
    'Predis\\Response\\Iterator\\MultiBulkTuple' => $vendorDir . '/predis/predis/src/Response/Iterator/MultiBulkTuple.php',
    'Predis\\Response\\ResponseInterface' => $vendorDir . '/predis/predis/src/Response/ResponseInterface.php',
    'Predis\\Response\\ServerException' => $vendorDir . '/predis/predis/src/Response/ServerException.php',
    'Predis\\Response\\Status' => $vendorDir . '/predis/predis/src/Response/Status.php',
    'Predis\\Session\\Handler' => $vendorDir . '/predis/predis/src/Session/Handler.php',
    'Predis\\Transaction\\AbortedMultiExecException' => $vendorDir . '/predis/predis/src/Transaction/AbortedMultiExecException.php',
    'Predis\\Transaction\\MultiExec' => $vendorDir . '/predis/predis/src/Transaction/MultiExec.php',
    'Predis\\Transaction\\MultiExecState' => $vendorDir . '/predis/predis/src/Transaction/MultiExecState.php',
    'Source\\Database' => $baseDir . '/app/source/Database.php',
    'Source\\Request' => $baseDir . '/app/source/Request.php',
    'Source\\Response' => $baseDir . '/app/source/Response.php',
    'Source\\Router' => $baseDir . '/app/source/Router.php',
    'Source\\Session' => $baseDir . '/app/source/Session.php',
    'Source\\View' => $baseDir . '/app/source/View.php',
);