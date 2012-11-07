<?php
/**
 * Digitクラス
 *
 * @package         Digit
 * @subpackage      Library
 * @author          Yujiro Takahashi <yujiro3@gamil.com>
 */
class Digit {
    /**
     * 文字サイズ
     * @var integer
     */
    private $_len;

    /**
     * 文字列マップ
     * @var array
     */
    private $_map;

    /**
     * 数値インデックス
     * @var array
     */
    private $_idx;

    /**
     * コンストラクタ
     *
     * @access public
     * @param array $map 文字列マップ
     * @return void
     */
    public function __construct($map) {
        $this->_len = count($map);
        $this->_map = $map;
        
        foreach ($this->_map as $num=> $key) {
            $this->_idx[$key] = $num;
        }
    }

    /**
     * 数値からhash生成
     *
     * @access public
     * @param integer
     * @return string
     */
    public function encode($num) {
        $hash  = '';
        $digit = 0;

        do {
            $order = floor($num / pow($this->_len, $digit));
            $hash  = $this->_map[($order % $this->_len)] . $hash;
        
            $digit++;
        } while ($order);
        
        return substr($hash, 1, $digit);
    }

    /**
     * hashから数値生成
     *
     * @access public
     * @param string
     * @return integer
     */
    public function decode($hash) {
        $digit = strlen ($hash) -1;
        $pos   = $num = 0;
        
        while ($digit >= 0) {
            $num += $this->_idx[$hash[$pos]] * pow($this->_len, $digit);
        
            $digit--;
            $pos++;
        }
        
        return $num;
    }
} // class Digit 
